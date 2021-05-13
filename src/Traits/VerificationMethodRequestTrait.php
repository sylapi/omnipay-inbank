<?php

namespace Omnipay\InBank\Traits;

trait VerificationMethodRequestTrait {
  
    public function getVerificationMethod(): string
    {
        return $this->getParameter('verificationMethod');
    }
    
    public function setVerificationMethod(string $value)
    {
        return $this->setParameter('verificationMethod', $value);
    }    
}