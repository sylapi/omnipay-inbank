<?php

namespace Omnipay\InBank\Contracts;

interface ApplicationRequestContract {
    public function getApplicationUuid(): string;
    public function setApplicationUuid(string $value);  
}
