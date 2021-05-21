<?php

namespace Omnipay\InBank\Contracts;

interface RecalculatePaymentScheduleRequest {
    public function getDownPaymentAmount(): ?float;
    public function setDownPaymentAmount(float $value);
}
