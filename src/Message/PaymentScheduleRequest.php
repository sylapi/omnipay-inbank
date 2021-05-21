<?php

namespace Omnipay\InBank\Message;

use Exception;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class PaymentScheduleRequest extends AbstractRequest
    implements Contracts\ApplicationRequestContract,
        Contracts\PaymentScheduleRequest
{
    use Traits\ApplicationRequestTrait;
    use Traits\PaymentScheduleTrait;

    const API_PATH = '/partner/v2/shops/:shop_uuid/applications/:application_uuid/payment_schedules?response_level=:response_level';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH,
            [
                ':shop_uuid',
                ':application_uuid',
                ':response_level'
            ],
            [
                $this->getShopUidd(),
                $this->getApplicationUuid(),
                $this->getResponseLevel()
            ]
        );

        $headers = $this->getHeaders($this->getHeaderAuthorization());

        try {
            $result = $this->httpClient->request(
                'GET',
                $apiUrl,
                $headers
            );

            $response = json_decode($result->getBody(), true);
            return new PaymentScheduleResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        $data = [
        ];

        return $data;
    }
}
