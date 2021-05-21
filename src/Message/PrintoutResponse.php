<?php

namespace Omnipay\InBank\Message;

use Omnipay\InBank\Contracts;
use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\InBank\Traits;

class PrintoutResponse extends AbstractResponse
    implements Contracts\PrintoutResponseContract
{
    use Traits\PrintoutResponseTrait;

    public function isSuccessful()
    {
        return $this->isSuccessfulResponse();
    }

    public function getTransactionId()
    {
        return $this->getUuid();
    }
}
