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
        if (Session::has('user_data') &&Session::has('fatoora_data')) {
            $fatoora_session_data=Session::get('fatoora_data');
            $user_data=Session::get('user_data');
            try {
                $paymentId = request('pmid') ?: 0;
                $sessionId = request('sid');
                $orderId  = $fatoora_session_data['order_id'];
                $curlData = $this->getPayLoadData($orderId);
                $curlData['CustomerName']=auth()->user()->name;
                $curlData['CustomerEmail']=auth()->user()->email;
                $curlData['CustomerReference']=$fatoora_session_data['order_id'];
                $curlData['InvoiceValue']=$user_data['passenger_total'];
                $mfObj   = new MyFatoorahPayment($this->mfConfig);
                $payment = $mfObj->getInvoiceURL($curlData, $paymentId, $orderId, $sessionId);
                return redirect($payment['invoiceURL']);
            } catch (Exception $ex) {
                $exMessage = __('myfatoorah.' . $ex->getMessage());
                Session::flash('error', $exMessage);
                return redirect()->route('visa_request_steptwo', ["country"=>$user_data['country'],"visatype"=>$user_data['visa_type']]);
            }
        } else {
            $message = "Processing error ! Try again after a while";
            Session::flash('error', $message);
            return redirect()->route('visa_request');
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
        if (Session::has('user_data') &&Session::has('fatoora_data')) {
            $fatoora_session_data=Session::get('fatoora_data');
            $user_data=Session::get('user_data');
            try {
                $order_id = request('paymentId');
                $mfObj = new MyFatoorahPaymentStatus($this->mfConfig);
                $data  = $mfObj->getPaymentStatus($order_id, 'PaymentId');
                $message = $this->getTestMessage($data->InvoiceStatus, $data->InvoiceError);
                $response = ['IsSuccess' => true, 'Message' => $message, 'Data' => $data];
            } catch (Exception $ex) {
                $exMessage = __('myfatoorah.' . $ex->getMessage());
                Session::flash('error', $exMessage);
                return redirect()->route('visa_request_steptwo', ["country"=>$user_data['country'],"visatype"=>$user_data['visa_type']]);
            }
            if ($response['IsSuccess']==true && $response['Data']->InvoiceStatus=='Paid') {
                //save current user session data into db
                $transaction_entry = new Transaction();
                $transaction_entry->user_id=auth()->user()->id;
                $transaction_entry->order_id=$fatoora_session_data['order_id'];
                $transaction_entry->total_amount=$user_data['passenger_total'];
                $transaction_entry->adult_count=$user_data['adult_count'];
                $transaction_entry->child_count=$user_data['child_count'];
                $transaction_entry->session_id=$fatoora_session_data['session_id'];
                $transaction_entry->user_name=auth()->user()->name;
                $transaction_entry->user_email=auth()->user()->email;
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
                $transaction_entry->save();
                //save data in  user_visa_applications table
                $VisaRequest = new UserVisaApplications();
                $VisaRequest->user_id = auth()->user()->id;
                $VisaRequest->content = serialize($user_data);
                $VisaRequest->order_id = $fatoora_session_data['order_id'];
                $VisaRequest->payment_id = $response['Data']->focusTransaction->PaymentId;
                $VisaRequest->save();


                $response_message="Payment transaction status: \n".$response['Message'];

                Session::flash('success', $response_message);
                return view('frontend.thankyou');
            } else {
                $response_message=$response['Message'];
                Session::flash('error', $response_message);
                return redirect()->route('visa_request_steptwo', ["country"=>$user_data['country'],"visatype"=>$user_data['visa_type']]);
            }
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
            $data = Session::get('user_data');
            try {
                //You can get the data using the order object in your system
                $orderId = auth()->user()->id.time();
                $fatoora_data=[];
                $fatoora_data['order_id']=$orderId;
                $user_data=[
                    "passenger_total"=>$data['passenger_total'],
                    "name"=>auth()->user()->name,
                    "email"=>auth()->user()->email
                ];
                $order   = $this->getTestOrderData($orderId, $user_data);

                //You can replace this variable with customer Id in your system
                $customerId = auth()->user()->id;
                //Generate MyFatoorah session for embedded payment

                //You can use the user defined field if you want to save card
                $userDefinedField = config('myfatoorah.save_card') && $customerId ? "CK-$customerId" : '';
                //Get the enabled gateways at your MyFatoorah acount to be displayed on checkout page

                $mfObj          = new MyFatoorahPaymentEmbedded($this->mfConfig);
                $mfSession = $mfObj->getEmbeddedSession($userDefinedField);
                $fatoora_data['session_id']=$mfSession->SessionId;
                $paymentMethods = $mfObj->getCheckoutGateways($order['total'], $order['currency'], config('myfatoorah.register_apple_pay'));
                if (empty($paymentMethods['all'])) {
                    throw new Exception('noPaymentGateways');
                }

                Session::put('fatoora_data', $fatoora_data);
                //Get Environment url
                $isTest = $this->mfConfig['isTest'];
                $vcCode = $this->mfConfig['countryCode'];
                $countries = MyFatoorah::getMFCountries();
                $jsDomain  = ($isTest) ? $countries[$vcCode]['testPortal'] : $countries[$vcCode]['portal'];
                return view('myfatoorah.checkout', compact('mfSession', 'paymentMethods', 'jsDomain', 'userDefinedField'));
            } catch (Exception $ex) {
                $exMessage = __('myfatoorah.' . $ex->getMessage());
                Session::flash('error', $exMessage);
                return redirect()->route('visa_request_steptwo', ["country"=>$data['country'],"visatype"=>$data['visa_type']]);
            }
        } else {
            $message = "Processing error ! Try again after a while";
            Session::flash('error', $message);
            return redirect()->route('visa_request');
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
    private function getTestOrderData($orderId, $user_data=null)
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
