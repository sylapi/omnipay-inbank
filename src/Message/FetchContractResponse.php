<?php

namespace Omnipay\InBank\Message;


use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\InBank\Contracts;

class FetchContractResponse  extends AbstractResponse
    implements Contracts\ContractResponseContract
{
    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }

    public function getTransactionId()
    {
        return $this->getContractUuid();
    }

    public function getContractUuid(): ?string
    {   
        return ($this->isSuccessful()) ? 
            ($this->data['contract']['uuid'] ?? null) : null;
    }
}
