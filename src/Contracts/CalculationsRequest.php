<?php

namespace Omnipay\InBank\Contracts;

interface CalculationsRequest {
    public function getProductCode(): string;
    public function setProductCode(string $value);

    public function getPeriod(): int;
    public function setPeriod(int $value);

    public function getDownPaymentAmount(): ?float;
    public function setDownPaymentAmount(?float $value);

    public function getPaymentDay(): ?int;
    public function setPaymentDay(?int $value); 
    
    public function getResponseLevel(): ?string;
    public function setResponseLevel(?string $value); 
}
