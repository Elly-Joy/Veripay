<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class MPESAController extends Controller
{
    public function getAccessToken()
    {
        try {
            $url = env('MPESA_ENV') == 0
                ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
                : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

            $caCertPath = 'C:\Users\USER\Downloads\cacert-2024-03-11.pem'; // Path to your CA bundle

            $curl = curl_init($url);
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_HTTPHEADER => ['Content-Type: application/json;charset=utf8'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER => false,
                    CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY') . ':' . env('MPESA_CONSUMER_SECRET'),
                    CURLOPT_CAINFO => $caCertPath, // Set the CA bundle path
                )
            );
            $response = curl_exec($curl);
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $curlError = curl_error($curl);
            curl_close($curl);

            if ($httpCode !== 200) {
                Log::error('Failed to retrieve access token. HTTP Code: ' . $httpCode . ' Response: ' . $response . ' Error: ' . $curlError);
                return false;
            }

            $response = json_decode($response);

            if (isset($response->access_token)) {
                return $response->access_token;
            } else {
                Log::error('Access token not found in response: ' . json_encode($response));
                return false;
            }
        } catch (Exception $e) {
            Log::error('Error retrieving access token: ' . $e->getMessage());
            return false;
        }
    }

    public function registerURLS()
    {
        $body = array(
            'ShortCode' => env('MPESA_SHORTCODE'),
            'ResponseType' => 'Completed',
            'ConfirmationURL' => env('MPESA_TEST_URL') . '/api/confirmation',
            'ValidationURL' => env('MPESA_TEST_URL') . '/api/validation',
        );
        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'
            : 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';

        $response = $this->makeHttp($url, $body);
        return $response;
    }

    public function stkPush(Request $request)
    {
        $timestamp = date('YmdHis');
        $password = base64_encode(env('MPESA_STK_SHORTCODE') . env('MPESA_PASSKEY') . $timestamp);
        $curl_post_data = array(
            'BusinessShortCode' => env('MPESA_STK_SHORTCODE'),
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerBuyGoodsOnline',
            'Amount' => $request->amount,
            'PartyA' => $request->phone,
            'PartyB' => env('MPESA_STK_SHORTCODE'),
            'PhoneNumber' => $request->phone,
            'CallBackURL' => env('MPESA_TEST_URL') . '/stkpush',
            'AccountReference' => $request->account,
            'TransactionDesc' => $request->account,
        );

        $logData = "MPESA Transaction Data:\n";
foreach ($curl_post_data as $key => $value) {
    $logData .= "$key: $value\n";
}
Log::info($logData);

        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'
            : 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $response = $this->makeHttp($url, $curl_post_data);

        Log::info('Simulation response: ', (array) $response);
        
        return $response;
    }

    public function simulateTransaction(Request $request)
    {
        $body = array(
            'ShortCode' => env('MPESA_SHORTCODE'),
            'Msisdn' => 254708374149,
            'Amount' => $request->amount,
            'BillRefNumber' => $request->account,
            'CommandID' => 'CustomerPayBillOnline'
        );
        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate'
            : 'https://api.safaricom.co.ke/mpesa/c2b/v1/simulate';
    
        $response = $this->makeHttp($url, $body);
    
        // Log the callback data
        $this->logCallbackData($response);
    
        return $response;
    }
    
    private function logCallbackData($data)
    {
        // Assuming you have a logger set up
        \Log::info('Daraja API Callback Data: ', (array) $data);
    }
    
  

    public function makeHttp($url, $body)
    {
        try {
            $accessToken = $this->getAccessToken();
            if (!$accessToken) {
                return response()->json(['error' => 'Failed to retrieve access token'], 500);
            }

            $caCertPath = 'C:\Users\USER\Downloads\cacert-2024-03-11.pem'; // Path to your CA bundle

            $curl = curl_init();
            curl_setopt_array(
                $curl,
                array(
                    CURLOPT_URL => $url,
                    CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Authorization:Bearer ' . $accessToken),
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => json_encode($body),
                    CURLOPT_CAINFO => $caCertPath, // Set the CA bundle path
                )
            );
            $curl_response = json_decode(curl_exec($curl));
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $curlError = curl_error($curl);
            curl_close($curl);

            if ($httpCode !== 200) {
                Log::error('HTTP request failed. HTTP Code: ' . $httpCode . ' Response: ' . json_encode($curl_response) . ' Error: ' . $curlError);
                return response()->json(['error' => 'HTTP request failed'], 500);
            }

            return $curl_response;
        } catch (Exception $e) {
            Log::error('Error making HTTP request: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
   
    public function confirmation(Request $request)
    {
        try {
            $transaction = new MpesaTransaction();
            $transaction->transaction_id = $request->input('TransID');
            $transaction->sender_name = $request->input('FirstName') . ' ' . $request->input('MiddleName') . ' ' . $request->input('LastName');
            $transaction->sender_number = $request->input('MSISDN');
            $transaction->amount = $request->input('TransAmount');
            $transaction->timestamp = $request->input('TransTime');
            $transaction->save();
    
            return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Confirmation received successfully']);
        } catch (\Exception $e) {
            \Log::error('Error saving transaction: ' . $e->getMessage());
            return response()->json(['ResultCode' => 1, 'ResultDesc' => 'Error saving transaction']);
        }
    }
    

    //public function validation(Request $request)
    //{
       // return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Validation successful']);
    //}
    }




