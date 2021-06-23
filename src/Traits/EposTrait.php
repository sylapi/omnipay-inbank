<?php

namespace Omnipay\InBank\Traits;

trait EposTrait {

    public function getProductCode(): string
    {
        return $this->getParameter('productCode');
    }
    
    public function setProductCode(string $value)
    {
        return $this->setParameter('productCode', $value);
    } 
    
    public function getTotalAmount(): string
    {
        return $this->getParameter('totalAmount');
    }
    
    public function setTotalAmount(string $value)
    {
        return $this->setParameter('totalAmount', $value);
    }

    public function getLocale(): string
    {
        return $this->getParameter('locale');
    }
    
    public function setLocale(string $value)
    {
        return $this->setParameter('locale', $value);
    }

    public function getCallbackUrl(): string
    {
        return $this->getParameter('callbackUrl');
    }
    
    public function setCallbackUrl(string $value)
    {
        return $this->setParameter('callbackUrl', $value);
    }

    public function getPurchaseReference(): string
    {
        return $this->getParameter('purchaseReference');
    }
    
    public function setPurchaseReference(string $value)
    {
        return $this->setParameter('purchaseReference', $value);
    }

    public function getMerchantDomainName(): string
    {
        return $this->getParameter('merchantDomainName');
    }
    
    public function setMerchantDomainName(string $value)
    {
        return $this->setParameter('merchantDomainName', $value);
    }
}