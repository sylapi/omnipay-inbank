<?php

namespace Omnipay\InBank\Message;

use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\InBank\Contracts;

class ApplicationVerificationStatusResponse extends AbstractResponse implements Contracts\ApplicationVerificationStatusResponseContract
{   
    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }

    public function getVerificationStatus(): ?string
    {
        return $this->data['status'] ?? null;
    }
}