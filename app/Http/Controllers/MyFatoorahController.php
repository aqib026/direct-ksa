<?php

namespace App\Http\Controllers;

use App\Models\UserVisaApplications;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\View\View;
use MyFatoorah\Library\MyFatoorah;
use MyFatoorah\Library\API\Payment\MyFatoorahPayment;
use MyFatoorah\Library\API\Payment\MyFatoorahPaymentEmbedded;
use MyFatoorah\Library\API\Payment\MyFatoorahPaymentStatus;
use Exception;
use Illuminate\Support\Facades\Session;
use App\Models\Transaction;

class MyFatoorahController extends Controller
{
    /**
     * @var array
     */
    public $mfConfig = [];

    //-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Initiate MyFatoorah Configuration
     */
    public function __construct()
    {
        $this->mfConfig = [
            'apiKey'      => config('myfatoorah.api_key'),
            'isTest'      => config('myfatoorah.test_mode'),
            'countryCode' => config('myfatoorah.country_iso'),
        ];
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Redirect to MyFatoorah Invoice URL
     * Provide the index method with the order id and (payment method id or session id)
     *
     * @return Response
     */
    public function index()
    {
        try {
            //For example: pmid=0 for MyFatoorah invoice or pmid=1 for Knet in test mode
            $user_transaction_record=Transaction::where('session_id',request('sid'))->where('status','pending')->first();
            if(isset($user_transaction_record)){
            $paymentId = request('pmid') ?: 0;
            $sessionId = $user_transaction_record->session_id;
            $orderId  = $user_transaction_record->order_id;
            $curlData = $this->getPayLoadData($orderId);
            $curlData['CustomerName']=$user_transaction_record->user_name;
            $curlData['CustomerEmail']=$user_transaction_record->user_email;
            $curlData['CustomerReference']=$user_transaction_record->order_id;
            $curlData['InvoiceValue']=$user_transaction_record->total_amount;
            $mfObj   = new MyFatoorahPayment($this->mfConfig);
            $payment = $mfObj->getInvoiceURL($curlData, $paymentId, $orderId, $sessionId);
            return redirect($payment['invoiceURL']);
            }else{
                $message = "There is a problem with payment process ,try again later";
                Session::flash('error', $message);
                return view('frontend.thankyou');
            }

        } catch (Exception $ex) {
            $exMessage = __('myfatoorah.' . $ex->getMessage());
            Session::flash('error', $exMessage);
            return view('frontend.thankyou');
        }
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Example on how to map order data to MyFatoorah
     * You can get the data using the order object in your system
     *
     * @param int|string $orderId
     *
     * @return array
     */
    private function getPayLoadData($orderId = null)
    {
        $callbackURL = route('fallback');

        return [
            // 'CustomerName'       => 'test',
            //  'InvoiceValue'       => 144,
            'DisplayCurrencyIso' => 'SAR',
            // 'CustomerEmail'      => $order['email'],
            'CallBackUrl'        => $callbackURL,
            'ErrorUrl'           => $callbackURL,
            'Language'           => 'en',
            // 'CustomerReference'  => $orderId,
        ];
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Get MyFatoorah Payment Information
     * Provide the callback method with the paymentId
     *
     * @return Response
     */
    public function callback()
    {
        try {
            $paymentId = request('paymentId');
            $mfObj = new MyFatoorahPaymentStatus($this->mfConfig);
            $data  = $mfObj->getPaymentStatus($paymentId, 'PaymentId');
            $message = $this->getTestMessage($data->InvoiceStatus, $data->InvoiceError);
            $response = ['IsSuccess' => true, 'Message' => $message, 'Data' => $data];
        } catch (Exception $ex) {
            $exMessage = __('myfatoorah.' . $ex->getMessage());
            Session::flash('error', $exMessage);
            return view('frontend.thankyou');
        }
        if($response['IsSuccess']==true){
            $transaction_entry =Transaction::where('order_id',$response['Data']->CustomerReference)->first();
            if(isset($transaction_entry)){
                $transaction_entry->status=$response['Data']->InvoiceStatus;
                $transaction_entry->invoice_id=$response['Data']->InvoiceId;
                $transaction_entry->transaction_id=$response['Data']->focusTransaction->TransactionId;
                $transaction_entry->payment_id=$response['Data']->focusTransaction->PaymentId;
                $transaction_entry->transaction_date=$response['Data']->focusTransaction->TransactionDate;
                $transaction_entry->service_charges=$response['Data']->focusTransaction->TotalServiceCharge;
                $transaction_entry->customer_service_charges=$response['Data']->focusTransaction->CustomerServiceCharge;
                $transaction_entry->vat_amount=$response['Data']->focusTransaction->VatAmount;
                $transaction_entry->invoice_value=$response['Data']->InvoiceValue;
                $transaction_entry->message=$response['Message'];
                $transaction_entry->card_type=$response['Data']->focusTransaction->PaymentGateway;
                $transaction_entry->update();
            }
            $response_message="Payment transaction status: \n".$response['Message'];
            if ($response['Data']->InvoiceStatus == 'Paid') {
                Session::flash('success', $response_message);
                return view('frontend.thankyou');
            }else{
                Session::flash('error', $response_message);
                return view('frontend.thankyou');
            }



        }else{
            $response_message="Payment transaction status: \n Processing error ,Try again after few seconds";
            Session::flash('error', $response_message);
            return view('frontend.thankyou');
        }
    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Example on how to Display the enabled gateways at your MyFatoorah account to be displayed on the checkout page
     * Provide the checkout method with the order id to display its total amount and currency
     *
     * @return View
     */
    public function checkout()
    {
        if (Session::has('user_data')) {

            try {
                $data = Session::get('user_data');
                //You can get the data using the order object in your system
                $orderId = auth()->user()->id.time();

                $user_data=[
                    "passenger_total"=>$data['passenger_total'],
                    "name"=>auth()->user()->name,
                    "email"=>auth()->user()->email
                ];
                $order   = $this->getTestOrderData($orderId,$user_data);

                //You can replace this variable with customer Id in your system
                $customerId = auth()->user()->id;

                //You can use the user defined field if you want to save card
                $userDefinedField = config('myfatoorah.save_card') && $customerId ? "CK-$customerId" : '';
                //Get the enabled gateways at your MyFatoorah acount to be displayed on checkout page
                $mfObj          = new MyFatoorahPaymentEmbedded($this->mfConfig);
                $paymentMethods = $mfObj->getCheckoutGateways($order['total'], $order['currency'], config('myfatoorah.register_apple_pay'));
                if (empty($paymentMethods['all'])) {
                    throw new Exception('noPaymentGateways');
                }
                //Generate MyFatoorah session for embedded payment
                $mfSession = $mfObj->getEmbeddedSession($userDefinedField);
                //save current user session data into db
                $transaction_entry = new Transaction();
                $transaction_entry->user_id=auth()->user()->id;
                $transaction_entry->order_id=$orderId;
                $transaction_entry->total_amount=$data['passenger_total'];
                $transaction_entry->adult_count=$data['adult_count'];
                $transaction_entry->child_count=$data['child_count'];
                $transaction_entry->session_id=$mfSession->SessionId;
                $transaction_entry->user_name=auth()->user()->name;
                $transaction_entry->user_email=auth()->user()->email;
                $transaction_entry->save();
                //save order id in  user_visa_applications table
                $record_id=$data['visa_request_record_id'];
                $user_application_record=UserVisaApplications::find($record_id);
                if(isset($user_application_record)){
                    $user_application_record->order_id=$orderId;
                    $user_application_record->update();
                }

                //Get Environment url
                $isTest = $this->mfConfig['isTest'];
                $vcCode = $this->mfConfig['countryCode'];

                $countries = MyFatoorah::getMFCountries();
                $jsDomain  = ($isTest) ? $countries[$vcCode]['testPortal'] : $countries[$vcCode]['portal'];
                return view('myfatoorah.checkout', compact('mfSession', 'paymentMethods', 'jsDomain', 'userDefinedField'));
            } catch (Exception $ex) {
                $exMessage = __('myfatoorah.' . $ex->getMessage());
                Session::flash('error', $exMessage);
                return view('frontend.thankyou');
            }
        } else {
            $message = "Found no data for online payment ! Try again after a while";
            Session::flash('error', $message);
            return view('frontend.thankyou');
        }

    }

//-----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * Example on how the webhook is working when MyFatoorah try to notify your system about any transaction status update
     */
    public function webhook(Request $request)
    {
        try {
            //Validate webhook_secret_key
            $secretKey = config('myfatoorah.webhook_secret_key');
            if (empty($secretKey)) {
                return response(null, 404);
            }

            //Validate MyFatoorah-Signature
            $mfSignature = $request->header('MyFatoorah-Signature');
            if (empty($mfSignature)) {
                return response(null, 404);
            }

            //Validate input
            $body  = $request->getContent();
            $input = json_decode($body, true);
            if (empty($input['Data']) || empty($input['EventType']) || $input['EventType'] != 1) {
                return response(null, 404);
            }

            //Validate Signature
            if (!MyFatoorah::isSignatureValid($input['Data'], $secretKey, $mfSignature, $input['EventType'])) {
                return response(null, 404);
            }

            //Update Transaction status on your system
            $result = $this->changeTransactionStatus($input['Data']);

            return response()->json($result);
        } catch (Exception $ex) {
            $exMessage = __('myfatoorah.' . $ex->getMessage());
            return response()->json(['IsSuccess' => false, 'Message' => $exMessage]);
        }
    }

//-----------------------------------------------------------------------------------------------------------------------------------------
    private function changeTransactionStatus($inputData)
    {
        //1. Check if orderId is valid on your system.
        $orderId = $inputData['CustomerReference'];

        //2. Get MyFatoorah invoice id
        $invoiceId = $inputData['InvoiceId'];

        //3. Check order status at MyFatoorah side
        if ($inputData['TransactionStatus'] == 'SUCCESS') {
            $status = 'Paid';
            $error  = '';
        } else {
            $mfObj = new MyFatoorahPaymentStatus($this->mfConfig);
            $data  = $mfObj->getPaymentStatus($invoiceId, 'InvoiceId');

            $status = $data->InvoiceStatus;
            $error  = $data->InvoiceError;
        }

        $message = $this->getTestMessage($status, $error);

        //4. Update order transaction status on your system
        return ['IsSuccess' => true, 'Message' => $message, 'Data' => $inputData];
    }

//-----------------------------------------------------------------------------------------------------------------------------------------
    private function getTestOrderData($orderId,$user_data=null)
    {
        return [
            'total'    => $user_data['passenger_total'],
            'currency' => 'SAR',
            'name'=>$user_data['name'],
            'email'=>$user_data['email'],
        ];
    }

//-----------------------------------------------------------------------------------------------------------------------------------------
    private function getTestMessage($status, $error)
    {
        if ($status == 'Paid') {
            return 'Invoice is paid.';
        } elseif ($status == 'Failed') {
            return 'Invoice is not paid due to ' . $error;
        } elseif ($status == 'Expired') {
            return $error;
        }
    }

//-----------------------------------------------------------------------------------------------------------------------------------------
}
