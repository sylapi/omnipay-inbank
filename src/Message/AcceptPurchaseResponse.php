<?php

namespace Omnipay\InBank\Message;

use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class AcceptPurchaseResponse extends AbstractResponse
    implements Contracts\AcceptPurchaseResponseContract
{   
    use Traits\AcceptPurchaseResponseTrait;

    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }
}