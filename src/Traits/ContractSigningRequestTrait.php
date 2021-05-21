<?php

namespace Omnipay\InBank\Traits;

trait ContractSigningRequestTrait {

    public function getConfirmationCode(): ?string
    {
        return $this->getParameter('confirmationCode');
    }
    
    public function setConfirmationCode(string $value)
    {
        return $this->setParameter('confirmationCode', $value);
    }        
}