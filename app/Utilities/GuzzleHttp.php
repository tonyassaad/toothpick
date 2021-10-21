<?php

namespace App\Utilities;

use Exception;
use GuzzleHttp\Client;

class GuzzleHttp
{
    protected $token = '5|qsaB6ofWhkeOrUEOrOVy6koDWLvQqyqZDgSDlLFFqMjKjG8Jo5w06w4xKLxq5GMJl1bmyq3E5nNW2NHh';
    // Autoredeem endpoint
    public $baseUrl;
    public $client;
    public $authKey;

    public function __construct($baseUrl, $authKey = '', $inputOptions = [])
    {
        $this->baseUrl = $baseUrl;
        $this->authKey = $authKey;
        $options = [
            'base_uri' => $this->baseUrl,
        ];

        if (isset($inputOptions['auth_type'])) {
            if ($inputOptions['auth_type'] === 'bearer') {
                $options['headers'] = [
                    'Authorization' => 'Bearer '.$this->token,
                    'Accept'        => 'application/json',
                ];
            } else {
                $options['headers'] = [
                    'Authorization' => 'Basic '.$this->authKey,
                    'Accept'        => 'application/json',
                ];
            }
        }

        $this->client = new Client($options);
    }

    public function post($uri, $body = [])
    {
        if (is_array($body) && count($body) > 0) {
            $bodyRequest = ($body);
        }

        try {
            $response = $this->client->post($uri, $body);
            $result = json_decode($response->getBody());

            return $result;
        } catch (Exception $e) {
            // Catch system or connection errors
            $return = ['code' => $e->getCode(), 'message' => $e->getMessage()];
        }
    }

    public function get($uri, $params = [])
    {
        if (is_array($params) && count($params) > 0) {
            $paramRequest = ($params);
        }

        try {
            $response = $this->client->get($uri, $paramRequest);
            $result = json_decode($response->getBody());

            return $result;
        } catch (Exception $e) {
            // Catch system or connection errors
            $return = ['code' => $e->getCode(), 'message' => $e->getMessage()];
        }
    }
}
