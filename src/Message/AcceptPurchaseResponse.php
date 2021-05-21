<?php

namespace Omnipay\InBank\Message;

use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\InBank\Contracts;

class AcceptPurchaseResponse extends AbstractResponse
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
        $data = $this->getData();
        
        $contractUuid = null;
        if (
            isset($data['contract'])
            && isset($data['contract']['uuid'])
        ) {
            $contractUuid = $data['contract']['uuid'];
        }

        return $contractUuid;
    }
}