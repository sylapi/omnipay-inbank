<?php

namespace Omnipay\InBank\Message;

use Exception;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class ApplicationVerificationStatusRequest extends AbstractRequest 
    implements Contracts\ApplicationRequestContract,
        Contracts\VerificationMethodRequestContract
{
    use Traits\ApplicationRequestTrait;
    use Traits\VerificationMethodRequestTrait;

    const API_PATH = '/partner/v2/shops/:shop_uuid/applications/:application_uuid/verifications?method=:method';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH, 
        [
            ':shop_uuid', 
            ':application_uuid', 
            ':method'
        ], 
        [ 
            $this->getShopUidd(), 
            $this->getApplicationUuid(),
            $this->getVerificationMethod()
        ]);

        $headers = $this->getHeaders($this->getHeaderAuthorization());
        
        try {
            $result = $this->httpClient->request(
                'GET', 
                $apiUrl, 
                $headers
            );

            $response = json_decode($result->getBody(), true);
            return new ApplicationVerificationStatusResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        return [];
    }

}
