<?php

namespace Omnipay\InBank\Traits;

trait EposRequestTrait {

    public function getSessionUuid(): ?string
    {
        return $this->getParameter('sessionUuid');
    }
    
    public function setSessionUuid(string $value)
    {
        return $this->setParameter('sessionUuid', $value);
    }        
}