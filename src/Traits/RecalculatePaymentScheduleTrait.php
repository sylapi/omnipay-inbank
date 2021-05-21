<?php

namespace Omnipay\InBank\Traits;

trait RecalculatePaymentScheduleTrait {

    public function getDownPaymentAmount(): ?float
    {
        return $this->getParameter('downPaymentAmount');
    }

    public function setDownPaymentAmount(float $value)
    {
        return $this->setParameter('downPaymentAmount', $value);
    }
}
