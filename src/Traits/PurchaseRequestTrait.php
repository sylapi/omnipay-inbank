<?php

namespace Omnipay\InBank\Traits;

trait PurchaseRequestTrait {

    public function getCreditApplication(): ?array
    {
        return $this->getParameter('creditApplication');
    }

    public function setCreditApplication(array $value)
    {
        return $this->setParameter('creditApplication', $value);
    }

    public function getCustomer(): ?array
    {
        return $this->getParameter('customer');
    }

    public function setCustomer(array $value)
    {
        return $this->setParameter('customer', $value);
    }  
    
    public function getCustomerAddresses(): ?array
    {
        return $this->getParameter('customerAddresses');
    }

    public function setCustomerAddresses(array $value)
    {
        return $this->setParameter('customerAddresses', $value);
    }
    
    public function getCustomerContact(): ?array
    {
        return $this->getParameter('customerContact');
    }

    public function setCustomerContact(array $value)
    {
        return $this->setParameter('customerContact', $value);
    }  
    
    public function getCustomerIdentification(): ?array
    {
        return $this->getParameter('customerIdentification');
    }

    public function setCustomerIdentification(array $value)
    {
        return $this->setParameter('customerIdentification', $value);
    }    
    
    public function getCustomerConsents(): ?array
    {
        return $this->getParameter('customerConsents');
    }

    public function setCustomerConsents(array $value)
    {
        return $this->setParameter('customerConsents', $value);
    }        
}