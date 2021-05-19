<?php

namespace Omnipay\InBank\Message;


use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\InBank\Contracts;

class RecalculatePaymentScheduleResponse extends AbstractResponse
    implements Contracts\ApplicationResponseContract
{
    public function isSuccessful()
    {
        return $this->isSuccessfulResponse();
    }

    public function getTransactionId()
    {
        return $this->getApplicationUuid();
    }

    public function getApplicationUuid(): ?string
    {
        return ($this->isSuccessful()) ?
            ($this->data['payment_schedule']['credit_application_uuid'] ?? null) : null;
    }
}
