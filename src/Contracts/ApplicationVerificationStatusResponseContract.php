<?php

namespace Omnipay\InBank\Contracts;

interface ApplicationVerificationStatusResponseContract {
    public function getVerificationStatus(): ?string;
}
