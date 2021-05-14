<?php

namespace Omnipay\InBank\Contracts;

interface ApplicationResponseContract {
    public function getApplicationUuid(): ?string;
}
