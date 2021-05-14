<?php

namespace Omnipay\InBank\Message;

use Exception;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;
use Omnipay\InBank\Message\AbstractRequest;

class ProductDetailsRequest extends AbstractRequest implements Contracts\ProductCodeRequestContract
{
    use Traits\ProductCodeRequestTrait;
    
    const API_PATH = '/partner/v2/shops/:shop_uuid/products?product_code=:product_code';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH, 
            [':shop_uuid', ':product_code'],
            [$this->getShopUidd(), $this->getProductCode()]
        );

        $headers = $this->getHeaders($this->getHeaderAuthorization());
        
        try {
            $result = $this->httpClient->request(
                'GET', 
                $apiUrl,
                $headers
            );

            $response = json_decode($result->getBody(), true);
            return new ProductDetailsResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        return [];
    }
}
