<?php

namespace Omnipay\InBank\Message;

use Exception;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;
use GuzzleHttp\Psr7;

class RecalculatePaymentScheduleRequest extends AbstractRequest
    implements Contracts\ApplicationRequestContract,
        Contracts\RecalculatePaymentScheduleRequest
{
    use Traits\ApplicationRequestTrait;
    use Traits\RecalculatePaymentScheduleTrait;

    const API_PATH = '/partner/v2/shops/:shop_uuid/applications/:application_uuid/recalculate_schedule';

    public function sendData($data)
    {
        $apiUrl = $this->getEndpoint(self::API_PATH,
            [
                ':shop_uuid',
                ':application_uuid'
            ],
            [
                $this->getShopUidd(),
                $this->getApplicationUuid()
            ]
        );

        $headers = $this->getHeaders($this->getHeaderAuthorization());

        try {
            $body = Psr7\Utils::streamFor(json_encode($data));
            $result = $this->httpClient->request(
                'PUT',
                $apiUrl,
                $headers,
                $body
            );

            $response = json_decode($result->getBody(), true);
            return new RecalculatePaymentScheduleResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        $data = [
            'down_payment_amount' => $this->getDownPaymentAmount()
        ];

        return $data;
    }
}
