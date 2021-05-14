<?php

namespace Omnipay\InBank\Message;

use Omnipay\InBank\Contracts;
use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\InBank\Traits;

class ContractPrintoutResponse extends AbstractResponse
    implements Contracts\PrintoutResponseContract,
        Contracts\ContractResponseContract
{
    use Traits\PrintoutResponseTrait;

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
        return $this->getUuid();
    }
}
