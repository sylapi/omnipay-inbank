<?php

namespace Omnipay\InBank\Contracts;

interface PurchaseRequestContract {
    public function getCreditApplication(): array;
    public function setCreditApplication(array $value);

    public function getCustomer(): array;
    public function setCustomer(array $value);

    public function getCustomerAddresses(): array;
    public function setCustomerAddresses(array $value);
    
    public function getCustomerContact(): array;
    public function setCustomerContact(array $value);

    public function getCustomerIdentification(): array;
    public function setCustomerIdentification(array $value);    

    public function getCustomerConsents(): array;
    public function setCustomerConsents(array $value);        
}
