<?php

namespace Omnipay\InBank\Message;

use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\InBank\Contracts;

class PurchaseResponse extends AbstractResponse 
    implements Contracts\ApplicationResponseContract
{   
    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }

    public function getTransactionId()
    {
        return $this->getApplicationUuid();
    }

    public function getApplicationUuid(): ?string
    {
        return ($this->isSuccessful()) ? ($this->data['uuid'] ?? null) : null;
    }
}
