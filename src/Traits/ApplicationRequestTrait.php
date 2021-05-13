<?php

namespace Omnipay\InBank\Traits;

trait ApplicationRequestTrait {

    public function getApplicationUuid(): string
    {
        return $this->getParameter('applicationUuid');
    }
    
    public function setApplicationUuid(string $value)
    {
        return $this->setParameter('applicationUuid', $value);
    }        
}