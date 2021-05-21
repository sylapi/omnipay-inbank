<?php

namespace Omnipay\InBank\Message;

use Exception;
use GuzzleHttp\Psr7;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class PurchaseRequest extends AbstractRequest 
    implements  Contracts\ApplicationRequestContract,
        Contracts\PurchaseRequestContract
{
    use Traits\ApplicationRequestTrait;
    use Traits\PurchaseRequestTrait;
    
    const API_PATH = '/partner/v2/shops/:shop_uuid/applications';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH, [':shop_uuid'], [$this->getShopUidd()]);

        $headers = $this->getHeaders($this->getHeaderAuthorization());
        
        try {
            $body = Psr7\Utils::streamFor(json_encode($data));
            $result = $this->httpClient->request(
                'POST', 
                $apiUrl,
                $headers,
                $body
            );

            $response = json_decode($result->getBody(), true);
            return new PurchaseResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        return [
            'credit_application' => $this->getCreditApplication(),
            'customer' => $this->getCustomer(),
            'customer_addresses' => $this->getCustomerAddresses(),
            'customer_contact' => $this->getCustomerContact(),
            'customer_identification' => $this->getCustomerIdentification(),
            'customer_consents' => $this->getCustomerConsents(),
        ];
    }
}
