<?php

namespace Omnipay\InBank\Message;

use Exception;
use GuzzleHttp\Psr7;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class InitContractSigningRequest extends AbstractRequest
    implements Contracts\ContractRequestContract,
        Contracts\SigningMethodRequestContract
{
    use Traits\ContractRequestTrait;
    use Traits\SigningMethodRequestTrait;

    const API_PATH = '/partner/v2/shops/:shop_uuid/contracts/:contract_uuid/signings';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH, 
            [':shop_uuid', ':contract_uuid'],
            [$this->getShopUidd(), $this->getContractUuid()]
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
            return new InitContractSigningResponse($this, $response);
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
