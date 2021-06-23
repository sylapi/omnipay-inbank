<?php

namespace Omnipay\InBank\Message;

use Exception;
use GuzzleHttp\Psr7;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class EposDetailsRequest extends AbstractRequest 
    implements  Contracts\ApplicationRequestContract
{
    use Traits\ApplicationRequestTrait, Traits\EposRequestTrait;
    
    const API_PATH = '/partner/v2/shops/:shop_uuid/pos_sessions/:session_uuid';

    public function sendData($data)
    { 
        $apiUrl = $this->getEndpoint(self::API_PATH, [':shop_uuid', ':session_uuid'], [$this->getShopUidd(), $this->getSessionUuid()]);
        $headers = $this->getHeaders($this->getHeaderAuthorization());
        
        try {
            $body = Psr7\Utils::streamFor(json_encode($data));
            $result = $this->httpClient->request(
                'GET', 
                $apiUrl,
                $headers,
                $body
            );

            $response = json_decode($result->getBody(), true);
            return new EposDetailsResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        return [];
    }
}
