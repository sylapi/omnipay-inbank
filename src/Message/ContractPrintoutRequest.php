<?php

namespace Omnipay\InBank\Message;

use Exception;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;
use GuzzleHttp\Psr7;

class ContractPrintoutRequest extends AbstractRequest
    implements Contracts\ContractRequestContract,
        Contracts\PrintoutRequestContract
{

    use Traits\ContractRequestTrait;
    use Traits\PrintoutRequestTrait;

    const API_PATH = '/partner/v2/shops/:shop_uuid/contracts/:contract_uuid/printouts';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH, [':shop_uuid', ':contract_uuid'], [$this->getShopUidd(), $this->getContractUuid()]);

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
            return new ContractPrintoutResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        $data = [];

        if ($this->isForceRegeneration()) {
            $data['forceRegeneration'] = $this->isForceRegeneration();
        }

        return $data;
    }
}
