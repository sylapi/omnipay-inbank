<?php

namespace Omnipay\InBank\Contracts;

interface PaymentScheduleRequest {
    public function getResponseLevel(): ?string;
    public function setResponseLevel(?string $value);
}
