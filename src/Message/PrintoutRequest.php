<?php

namespace Omnipay\InBank\Message;

use Exception;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;
use GuzzleHttp\Psr7;

class PrintoutRequest extends AbstractRequest
    implements Contracts\ApplicationRequestContract,
        Contracts\PrintoutRequestContract,
        Contracts\PrintoutTypeRequestContract
{
    use Traits\ApplicationRequestTrait;
    use Traits\PrintoutRequestTrait;
    use Traits\PrintoutTypeRequestTrait;

    const API_PATH = '/partner/v2/shops/:shop_uuid/applications/:application_uuid/printouts?type=:type';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH,
            [':shop_uuid', ':application_uuid', ':type'],
            [ $this->getShopUidd(), $this->getApplicationUuid(), $this->getPrintoutType() ]
        );

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
            return new PrintoutResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        $data = [];

        if($this->isForceRegeneration()) {
            $data['forceRegeneration'] = $this->isForceRegeneration();
        }

        return $data;
    }
}
