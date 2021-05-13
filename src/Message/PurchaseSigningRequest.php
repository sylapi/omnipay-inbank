<?php

namespace Omnipay\InBank\Message;

use Exception;
use GuzzleHttp\Psr7;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class PurchaseSigningRequest extends AbstractRequest
    implements Contracts\ApplicationRequestContract,
        Contracts\SigningMethodRequestContract
{
    use Traits\ApplicationRequestTrait;
    use Traits\SigningMethodRequestTrait;

    const API_PATH = '/partner/v2/shops/:shop_uuid/applications/:application_uuid/signings';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH, 
            [':shop_uuid', ':application_uuid'],
            [$this->getShopUidd(), $this->getApplicationUuid()]
        );

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
            return new PurchaseSigningResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        return [
            'method' => $this->getSigningMethod()
        ];
    }
}
