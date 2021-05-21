<?php

namespace Omnipay\InBank\Contracts;

interface ContractResponseContract {
    public function getContractUuid(): ?string;
}