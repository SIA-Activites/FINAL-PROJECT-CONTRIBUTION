<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

trait ConsumesExternalService
{
        public function performRequest($method, $requestUrl, $form_params = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        if(isset($this->secret)){
            $headers['Authorization'] = $this->secret;
        }

        try {
            $response = $client->request($method, $requestUrl, [
                'form_params' => $form_params,
                'headers' => $headers,
            ]);

            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            if ($e->hasResponse() && $e->getResponse()->getStatusCode() === 404) {
                $responseBody = $e->getResponse()->getBody()->getContents();
                $responseData = json_decode($responseBody, true);
                $errorData = [
                    'error' => $responseData['error'],
                    'code' => $responseData['code'],
                ];
                // Convert the error data to JSON string
                return json_encode($errorData);
            }
            throw $e;
        }
    }
}
