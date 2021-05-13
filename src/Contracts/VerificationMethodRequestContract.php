<?php

namespace Omnipay\InBank\Contracts;

interface VerificationMethodRequestContract {
    public function getVerificationMethod(): string;
    public function setVerificationMethod(string $value); 
}
