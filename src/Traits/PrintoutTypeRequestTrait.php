<?php

namespace Omnipay\InBank\Traits;

trait PrintoutTypeRequestTrait {

    public function getPrintoutType(): ?string
    {
        return $this->getParameter('printoutType');
    }

    public function setPrintoutType(string $value)
    {
        return $this->setParameter('printoutType', $value);
    }
}
