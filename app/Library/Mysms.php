<?php

namespace App\Library;

use InvalidArgumentException;
use App\Models\SmsLog;

class Mysms
{
    //resource from http://api.mysms.com/index.html

    private $ApiKey = false;

    private $password;
    private $AuthToken = false;

    private $BaseUrl = 'https://api.mysms.com/';

    private $msisdn;

    public function __construct($apikey= false, $authtoken = false)
    {

        $this->ApiKey = env('MYSMS_API_KEY', $apikey);
        $this->AuthToken = $authtoken;
        $this->msisdn = env('MYSMS_MSISDN');
        $this->password = env('MYSMS_PASSWORD');
    }

    public function setAuthToken($authtoken)
    {
        $this->AuthToken = $authtoken;
    }

    public function authanticate()
    {
        $login = $this->ApiCall('json', '/user/login', ['msisdn' => $this->msisdn, 'password' => $this->password]); //providing REST type(json/xml)
        $user_info = json_decode($login); //decode json string to get AuthToken
        if (empty($user_info->authToken)) {
            throw new InvalidArgumentException("MySMS API Authantication Failed");
        }
        $this->AuthToken = $user_info->authToken;
    }

    public function sendSMS($mobile, $message)
    {
        if(empty($mobile))  {
            return false;
        }
        if (empty($this->AuthToken)) {
            $this->authanticate();
        }
        $mobile = '+94' . substr($mobile, 1);
        $sms_data = ['recipients' => [$mobile], 'message' => $message, 'authToken' => $this->AuthToken, "encoding" => 0,
            "smsConnectorId" => 0,
            "store" => true];
        $response = $this->ApiCall('json', '/remote/sms/send', $sms_data);
        $this->logSms($mobile, $message, $response);
        $rdata = json_decode($response);
        if ($rdata->errorCode == 0) {
            return true;
        }
    }

    public function ApiCall($rest, $resource, $data)
    {
        if ($rest == '' && $rest != 'json' && $rest != 'xml') {
            die('Please provide valid REST type: xml/json!');
        }
        //check if $rest is xml or json

        elseif (filter_var($this->BaseUrl . $rest . $resource, FILTER_VALIDATE_URL) == false) {
            die('Provided Resource or MountUrl is not Valid!');
        }
        //check if https://api.mysms.com/$rest/$resource is valid url

        elseif (!is_array($data)) {
            die('Provide data is not an Array!');
        }
        //check if provided $data is valid array

        else {

            //insert api key into $data
            $data['apiKey'] = $this->ApiKey;

            $result = $this->curlRequest($rest . $resource, $data);
            return $result;
        }

    }

    private function logSms($mobile, $message, $response)   {
        $log = new SmsLog();
        $log->mobile = $mobile;
        $log->message = $message;
        $log->response = $response;

        $log->save();
    }

    private function curlRequest($resource, $data)
    {
        $json_encoded_data = json_encode($data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->BaseUrl . $resource);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_encoded_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json;charset=utf-8',
            'Content-Length: ' . strlen($json_encoded_data))
        );
        return curl_exec($curl);

    }

}
