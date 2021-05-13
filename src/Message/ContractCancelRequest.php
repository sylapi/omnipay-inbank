<?php

namespace Omnipay\InBank\Message;

use Exception;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class ContractCancelRequest extends AbstractRequest 
    implements  Contracts\ContractRequestContract
{
    use Traits\ContractRequestTrait;
    
    const API_PATH = '/partner/v2/shops/:shop_uuid/contracts/:contract_uuid/cancel';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH, [':shop_uuid', ':contract_uuid'], [$this->getShopUidd(), $this->getContractUuid()]);

        $headers = $this->getHeaders($this->getHeaderAuthorization());
        
        try {
            $result = $this->httpClient->request(
                'POST', 
                $apiUrl,
                $headers
            );

            $response = json_decode($result->getBody(), true);
            return new PurchaseResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        return [];
    }
}
