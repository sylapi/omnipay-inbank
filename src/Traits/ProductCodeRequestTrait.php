<?php

namespace Omnipay\InBank\Traits;

trait ProductCodeRequestTrait {

    public function getProductCode(): ?string
    {
        return $this->getParameter('productCode');
    }
    
    public function setProductCode(string $value)
    {
        return $this->setParameter('productCode', $value);
    }        
}