<?php

namespace App\Utilities;

use Exception;

class Curl
{
    public $curl;

    public function __construct()
    {
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 10);
    }

    public function setPostData($postData)
    {
        return curl_setopt(
            $this->curl,
            CURLOPT_POSTFIELDS,
            $postData
        );
    }

    public function setUrlOption($url)
    {
        return curl_setopt($this->curl, CURLOPT_URL, $url);
    }

    public function setUrlReturnTranser()
    {
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
    }

    public function setHttpHeader($headerArray)
    {
        return curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headerArray);
    }

    public function execute()
    {
        try {
            return curl_exec($this->curl);
            curl_close($this->curl);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
