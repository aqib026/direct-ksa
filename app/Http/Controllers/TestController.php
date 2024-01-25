<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use MyFatoorah\Library\MyFatoorah;
use MyFatoorah\Library\API\Payment\MyFatoorahPayment;

class TestController extends Controller
{
    //
    public function index()
    {
        $mfConfig = [
            /**
             * API Token Key (string)
             * Accepted value:
             * Live Token: https://myfatoorah.readme.io/docs/live-token
             * Test Token: https://myfatoorah.readme.io/docs/test-token
             */
            'apiKey'      => 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL',
            /*
             * Country ISO Code (string)
             * Accepted value: KWT, SAU, ARE, QAT, BHR, OMN, JOD, or EGY. Check https://docs.myfatoorah.com/docs/iso-lookups
             */
            'countryCode' => 'KWT',
            /**
             * Test Mode (boolean)
             * Accepted value: true for the test mode or false for the live mode
             */
            'isTest'      => true,
        ];
        
        /* --------------------------- InitiatePayment Endpoint --------------------- */
        $invoiceValue       = 50;
        $displayCurrencyIso = 'KWD';
        
        //------------- Post Fields -------------------------
        //Check https://docs.myfatoorah.com/docs/initiate-payment#request-model
        //------------- Call the Endpoint -------------------------
        try {
            $mfObj          = new MyFatoorahPayment($mfConfig);
            $paymentMethods = $mfObj->initiatePayment($invoiceValue, $displayCurrencyIso);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            die;
        }
        
        
        //You can save $paymentMethods information in database to be used later
        $paymentMethodId =  2;
        //foreach ($paymentMethods as $pm) {
        //    if ($pm->PaymentMethodEn == 'VISA/MASTER') {
        //        $paymentMethodId = $pm->PaymentMethodId;
        //        break;
        //    }
        //}
        
        /* --------------------------- ExecutePayment Endpoint ---------------------- */
        
        //Fill customer address array
        /* $customerAddress = array(
          'Block'               => 'Blk #', //optional
          'Street'              => 'Str', //optional
          'HouseBuildingNo'     => 'Bldng #', //optional
          'Address'             => 'Addr', //optional
          'AddressInstructions' => 'More Address Instructions', //optional
          ); */
        
        //Fill invoice item array
        /* $invoiceItems[] = [
          'ItemName'  => 'Item Name', //ISBAN, or SKU
          'Quantity'  => '2', //Item's quantity
          'UnitPrice' => '25', //Price per item
          ]; */
        
        //Fill suppliers array
        /* $suppliers = [
          [
          'SupplierCode'  => 1,
          'InvoiceShare'  => '2',
          'ProposedShare' => null,
          ]
          ]; */
        
        //Parse the phone string
        $phone = MyFatoorah::getPhone('+965 123456789');
        
        //------------- Post Fields -------------------------
        //Check https://docs.myfatoorah.com/docs/execute-payment#request-model
        $postFields = [
            //Fill required data
            'InvoiceValue'    => $invoiceValue,
            'PaymentMethodId' => $paymentMethodId,
                //Fill optional data
                'CustomerName'       => 'test user',
                //'DisplayCurrencyIso' => $displayCurrencyIso,
                //'MobileCountryCode'  => $phone[0],
                //'CustomerMobile'     => $phone[1],
                //'CustomerEmail'      => 'email@example.com',
                // 'CallBackUrl'        => 'https://2f2c-2407-d000-d-6cb3-91e1-30c8-53cd-5e4e.ngrok-free.app/fallback',
                //'ErrorUrl'           => 'https://example.com/callback.php', //or 'https://example.com/error.php'
                //'Language'           => 'en', //or 'ar'
                //'CustomerReference'  => 'orderId',
                //'CustomerCivilId'    => 'CivilId',
                //'UserDefinedField'   => 'This could be string, number, or array',
                //'ExpiryDate'         => '', //The Invoice expires after 3 days by default. Use 'Y-m-d\TH:i:s' format in the 'Asia/Kuwait' time zone.
                //'CustomerAddress'    => $customerAddress,
                //'InvoiceItems'       => $invoiceItems,
                //'Suppliers'          => $suppliers,
        ];
        
        //------------- Call the Endpoint -------------------------
        try {
            $mfObj = new MyFatoorahPayment($mfConfig);
            $data  = $mfObj->executePayment($postFields);
        
            //You can save payment data in database as per your needs
            $invoiceId   = $data->InvoiceId;
            $paymentLink = $data->PaymentURL;
        
            //Display the result to your customer
            //Redirect your customer to complete the payment process
            echo '<h3><u>Summary:</u></h3>';
            echo "To pay the invoice ID <b>$invoiceId</b>, click on:<br>";
            echo "<a href='$paymentLink' target='_blank'>$paymentLink</a><br><br>";
        
            echo '<h3><u>ExecutePayment Response Data:</u></h3><pre>';
            print_r($data);
            echo '</pre>';
        
            echo '<h3><u>InitiatePayment Response Data:</u></h3><pre>';
            print_r($paymentMethods);
            echo '</pre>';
        } catch (Exception $ex) {
            echo $ex->getMessage();
            die;
        }
    }
    public function fallback(Request $request)
    {
        echo "<pre>";
        Log::info('payment response<br>'. print_r($request, true));
    }
    public function directPayment()
    {
        $mfConfig = [
            /**
             * API Token Key (string)
             * Accepted value:
             * Live Token: https://myfatoorah.readme.io/docs/live-token
             * Test Token: https://myfatoorah.readme.io/docs/test-token
             */
            'apiKey'      => 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL',
            /*
             * Country ISO Code (string)
             * Accepted value: KWT, SAU, ARE, QAT, BHR, OMN, JOD, or EGY. Check https://docs.myfatoorah.com/docs/iso-lookups
             */
            'countryCode' => 'KWT',
            /**
             * Test Mode (boolean)
             * Accepted value: true for the test mode or false for the live mode
             */
            'isTest'      => true,
        ];
        
        /* --------------------------- InitiatePayment Endpoint --------------------- */
        $invoiceValue       = 50;
        $displayCurrencyIso = 'KWD';
        
        //------------- Post Fields -------------------------
        //Check https://docs.myfatoorah.com/docs/initiate-payment#request-model
        //------------- Call the Endpoint -------------------------
        try {
            $mfObj          = new MyFatoorahPayment($mfConfig);
            $paymentMethods = $mfObj->initiatePayment($invoiceValue, $displayCurrencyIso);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            die;
        }
        
        
        //You can save $paymentMethods information in database to be used later
        $paymentMethodId = 20;
        //foreach ($paymentMethods as $pm) {
        //    if ($pm->PaymentMethodEn == 'Visa/Master Direct 3DS Flow' && $pm->IsDirectPayment) {
        //        $paymentMethodId = $pm->PaymentMethodId;
        //        break;
        //    }
        //}
        
        /* --------------------------- ExecutePayment Endpoint ---------------------- */
        
        //Fill customer address array
        /* $customerAddress = array(
          'Block'               => 'Blk #', //optional
          'Street'              => 'Str', //optional
          'HouseBuildingNo'     => 'Bldng #', //optional
          'Address'             => 'Addr', //optional
          'AddressInstructions' => 'More Address Instructions', //optional
          ); */
        
        //Fill invoice item array
        /* $invoiceItems[] = [
          'ItemName'  => 'Item Name', //ISBAN, or SKU
          'Quantity'  => '2', //Item's quantity
          'UnitPrice' => '25', //Price per item
          ]; */
        
        //Fill suppliers array
        /* $suppliers = [
          [
          'SupplierCode'  => 1,
          'InvoiceShare'  => '2',
          'ProposedShare' => null,
          ]
          ]; */
        
        //Parse the phone string
        $phone = MyFatoorah::getPhone('+965 123456789');
        
        //------------- Post Fields -------------------------
        //Check https://docs.myfatoorah.com/docs/execute-payment#request-model
        $postFields = [
            //Fill required data
            'InvoiceValue'    => $invoiceValue,
            'PaymentMethodId' => $paymentMethodId,
                //Fill optional data
                //'CustomerName'       => 'fname lname',
                //'DisplayCurrencyIso' => $displayCurrencyIso,
                //'MobileCountryCode'  => $phone[0],
                //'CustomerMobile'     => $phone[1],
                //'CustomerEmail'      => 'email@example.com',
                //'CallBackUrl'        => 'https://example.com/callback.php',
                //'ErrorUrl'           => 'https://example.com/callback.php', //or 'https://example.com/error.php'
                //'Language'           => 'en', //or 'ar'
                //'CustomerReference'  => 'orderId',
                //'CustomerCivilId'    => 'CivilId',
                //'UserDefinedField'   => 'This could be string, number, or array',
                //'ExpiryDate'         => '', //The Invoice expires after 3 days by default. Use 'Y-m-d\TH:i:s' format in the 'Asia/Kuwait' time zone.
                //'CustomerAddress'    => $customerAddress,
                //'InvoiceItems'       => $invoiceItems,
                //'Suppliers'          => $suppliers,
        ];
        
        //------------- Call the Endpoint -------------------------
        try {
            $mfObj = new MyFatoorahPayment($mfConfig);
            $data  = $mfObj->executePayment($postFields);
        
            //You can save payment data in database as per your needs
            $invoiceId   = $data->InvoiceId;
            $paymentLink = $data->PaymentURL;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            die;
        }
        
        /* --------------------------- DirectPayment Endpoint ----------------------- */
        //------------- Post Fields -------------------------
        $cardInfo = [
            'PaymentType' => 'card',
            'Bypass3DS'   => false,
            'Card'        => [
                'Number'         => '5123450000000008',
                'ExpiryMonth'    => '05',
                'ExpiryYear'     => '21',
                'SecurityCode'   => '100',
                'CardHolderName' => 'fname lname'
            ]
        ];
        
        //------------- Call the Endpoint -------------------------
        try {
            $mfObj = new MyFatoorah($mfConfig);
            $json  = $mfObj->callAPI($paymentLink, $cardInfo);
        
            //You can save payment data in database as per your needs
            $paymentId = $json->Data->PaymentId;
            $otpLink   = $json->Data->PaymentURL;
        
            //Display the result to your customer
            //Redirect your customer to complete the payment process
            echo '<h3><u>Summary:</u></h3>';
            echo "To pay the invoice ID <b>$invoiceId</b> and with payment ID: <b>$paymentId</b>, click on:<br>";
            echo "<a href='$otpLink' target='_blank'>$otpLink</a><br><br>";
        
            echo '<h3><u>DirectPayment Response Object:</u></h3><pre>';
            print_r($json);
            echo '</pre>';
        
            echo '<h3><u>ExecutePayment Response Data:</u></h3><pre>';
            print_r($data);
            echo '</pre>';
        
            echo '<h3><u>InitiatePayment Response Data:</u></h3><pre>';
            print_r($paymentMethods);
            echo '</pre>';
        } catch (Exception $ex) {
            echo $ex->getMessage();
            die;
        }
    }
}
