<?php

namespace Omnipay\InBank\Contracts;

interface ApplicationVerificationRequestContract {
    public function getUuid(): ?string;
    public function setUuid(string $value);
}
