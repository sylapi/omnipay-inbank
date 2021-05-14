<?php

namespace Omnipay\InBank\Contracts;

interface ProductCodeRequestContract {
    public function getProductCode(): ?string;
    public function setProductCode(string $value);  
}