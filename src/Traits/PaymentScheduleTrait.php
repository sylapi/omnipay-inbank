<?php

namespace Omnipay\InBank\Traits;

trait PaymentScheduleTrait {

    public function getResponseLevel(): ?string
    {
        return $this->getParameter('responseLevel');
    }

    public function setResponseLevel(?string $value)
    {
        return $this->setParameter('responseLevel', $value);
    }
}
