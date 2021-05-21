<?php

namespace Omnipay\InBank\Traits;

trait PrintoutRequestTrait {

    public function isForceRegeneration(): bool
    {
        return (bool) $this->getParameter('forceRegeneration');
    }
    
    public function setForceRegeneration(bool $value)
    {
        return $this->setParameter('forceRegeneration', $value);
    }        
}