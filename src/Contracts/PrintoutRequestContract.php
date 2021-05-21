<?php

namespace Omnipay\InBank\Contracts;

interface PrintoutRequestContract {
    public function isForceRegeneration(): bool;
    public function setForceRegeneration(bool $value);
}
