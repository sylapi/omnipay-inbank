<?php

namespace Omnipay\InBank\Traits;

trait SigningMethodRequestTrait {

    public function getSigningMethod(): ?string
    {
        return $this->getParameter('signingMethod');
    }
    
    public function setSigningMethod(string $value)
    {
        return $this->setParameter('signingMethod', $value);
    }        
}