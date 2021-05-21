<?php

namespace Omnipay\InBank\Traits;

trait ApplicationVerificationRequestTrait {
  
    public function getUuid(): ?string
    {
        return $this->getParameter('uuid');
    }
    
    public function setUuid(string $value)
    {
        return $this->setParameter('uuid', $value);
    }
}