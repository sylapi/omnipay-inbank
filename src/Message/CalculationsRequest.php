<?php

namespace Omnipay\InBank\Message;

use Exception;
use GuzzleHttp\Psr7;
use Omnipay\InBank\Message\AbstractRequest;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class CalculationsRequest extends AbstractRequest 
    implements Contracts\CalculationsRequest
{
    use Traits\CalculationsTrait;

    const API_PATH = '/partner/v2/shops/:shop_uuid/calculations';

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
            return new CalculationsResponse($this, $response);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage(), $exception->getCode());
        }
    }

    public function getData()
    {
        $data = [
            'product_code' => $this->getProductCode(),
            'amount' => $this->getAmount(),
            'period' => $this->getPeriod(),
        ];

        if($this->getDownPaymentAmount()) {
            $data['down_payment_amount'] = $this->getDownPaymentAmount();
        }

        if($this->getPaymentDay()) {
            $data['payment_day'] = $this->getPaymentDay();
        }

        if($this->getResponseLevel()) {
            $data['response_level'] = $this->getResponseLevel();
        }


        var_dump($data);

        return $data;
    }
}
