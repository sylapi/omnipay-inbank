<?php

namespace Omnipay\InBank\Message;

use Exception;
use GuzzleHttp\Psr7;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class ApplicationVerificationRequest extends AbstractRequest 
    implements  Contracts\ApplicationRequestContract,
        Contracts\ApplicationVerificationRequestContract,
        Contracts\VerificationMethodRequestContract
{
    use Traits\ApplicationRequestTrait;
    use Traits\ApplicationVerificationRequestTrait;
    use Traits\VerificationMethodRequestTrait;
    
    const API_PATH = '/partner/v2/shops/:shop_uuid/applications/:application_uuid/verifications';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH, [':shop_uuid', ':application_uuid'], [$this->getShopUidd(), $this->getApplicationUuid()]);

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
            return new ApplicationVerificationResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        return [
            'uuid' => $this->getUuid(),
            'method' => $this->getVerificationMethod(),
            'return_url' => $this->getReturnUrl()
        ];
    }
}
