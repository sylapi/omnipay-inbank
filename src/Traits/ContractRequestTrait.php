<?php

namespace Omnipay\InBank\Traits;

trait ContractRequestTrait {

    public function getContractUuid(): string
    {
        return $this->getParameter('contractUuid');
    }
    
    public function setContractUuid(string $value)
    {
        return $this->setParameter('contractUuid', $value);
    }        
}