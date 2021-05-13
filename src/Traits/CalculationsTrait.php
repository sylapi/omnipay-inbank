<?php

namespace Omnipay\InBank\Traits;

trait CalculationsTrait {

    public function getProductCode(): string
    {
        return $this->getParameter('productCode');
    }
    
    public function setProductCode(string $value)
    {
        return $this->setParameter('productCode', $value);
    }  
    
    public function getPeriod(): int
    {
        return $this->getParameter('period');
    }
    
    public function setPeriod(int $value)
    {
        return $this->setParameter('period', $value);
    }

    public function getDownPaymentAmount(): ?float
    {
        return $this->getParameter('downPaymentAmount');
    }
    
    public function setDownPaymentAmount(?float $value)
    {
        return $this->setParameter('downPaymentAmount', $value);
    }

    public function getPaymentDay(): ?int
    {
        return $this->getParameter('paymentDay');
    }
    
    public function setPaymentDay(?int $value)
    {
        return $this->setParameter('paymentDay', $value);
    }
    
    public function getResponseLevel(): ?string
    {
        return $this->getParameter('responseLevel');
    }
    
    public function setResponseLevel(?string $value)
    {
        return $this->setParameter('responseLevel', $value);
    }     
}