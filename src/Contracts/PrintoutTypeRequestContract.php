<?php

namespace Omnipay\InBank\Contracts;

interface PrintoutTypeRequestContract {
    public function getPrintoutType(): ?string;
    public function setPrintoutType(string $value);
}
