<?php

namespace Omnipay\InBank\Message;

use Exception;
use Omnipay\InBank\Message\AbstractRequest;

class PingRequest extends AbstractRequest
{
    const API_PATH = '/partner/v2/ping';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH);

        $headers = $this->getHeaders($this->getHeaderAuthorization());
        
        try {
            $result = $this->httpClient->request(
                'GET', 
                $apiUrl,
                $headers
            );

            $response = json_decode($result->getBody(), true);
            return new PingResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        return [
            
        ];
    }
}
