<?php

namespace Omnipay\InBank\Message;

use Exception;
use GuzzleHttp\Psr7;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class EposRequest extends AbstractRequest 
    implements  Contracts\ApplicationRequestContract,
        Contracts\PurchaseRequestContract
{
    use Traits\ApplicationRequestTrait;
    use Traits\PurchaseRequestTrait;
    use Traits\EposTrait;
    
    const API_PATH = '/partner/v2/shops/:shop_uuid/pos_sessions';

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
            return new EposResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        return [
            "product_code" => $this->getProductCode(), 
            "total_amount" => $this->getTotalAmount(), 
            "currency" => $this->getCurrency(), 
            "locale" => $this->getLocale(), 
            "partner_urls" => [
                "return_url" => $this->getReturnUrl(), 
                "cancel_url" => $this->getCancelUrl(), 
                "callback_url" => $this->getCallbackUrl() 
            ], 
            "purchase" => [
                "purchase_reference" => $this->getPurchaseReference(), 
                "merchant" => [
                    "merchant_domain_name" => $this->getMerchantDomainName()
                ] 
            ] 
        ];
    }
}
