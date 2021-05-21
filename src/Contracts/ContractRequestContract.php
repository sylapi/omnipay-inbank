<?php

namespace Omnipay\InBank\Contracts;

interface ContractRequestContract {
    public function getContractUuid(): ?string;
    public function setContractUuid(string $value);  
}