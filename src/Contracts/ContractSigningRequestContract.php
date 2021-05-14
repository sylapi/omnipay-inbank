<?php

namespace Omnipay\InBank\Contracts;

interface ContractSigningRequestContract {
    public function getConfirmationCode(): ?string;
    public function setConfirmationCode(string $value);  
}