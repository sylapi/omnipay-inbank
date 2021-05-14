<?php

namespace Omnipay\InBank\Message;

use Exception;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class FetchCustomerRequest extends AbstractRequest
    implements Contracts\ApplicationRequestContract
{
    use Traits\ApplicationRequestTrait;

    const API_PATH = '/partner/v2/shops/:shop_uuid/applications/:application_uuid/customer';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH, [':shop_uuid', ':application_uuid'], [ $this->getShopUidd(), $this->getApplicationUuid() ]);

        $headers = $this->getHeaders($this->getHeaderAuthorization());
        
        try {
            $result = $this->httpClient->request(
                'GET', 
                $apiUrl,
                $headers
            );

            $response = json_decode($result->getBody(), true);
            return new FetchCustomerResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        return [];
    }
}
