<?php

namespace Omnipay\InBank\Contracts;

interface SigningMethodRequestContract {
    public function getSigningMethod(): string;
    public function setSigningMethod(string $value);  
}
