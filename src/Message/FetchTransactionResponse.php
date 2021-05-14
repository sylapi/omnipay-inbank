<?php

namespace Omnipay\InBank\Message;


use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class FetchTransactionResponse  extends AbstractResponse
    implements Contracts\FetchTransactionResponseContract,
        Contracts\ApplicationResponseContract
{
    use Traits\FetchTransactionResponseTrait;
    
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
        return ($this->isSuccessful()) ? 
            ($this->data['credit_application']['uuid'] ?? null) : null;
    }
}
