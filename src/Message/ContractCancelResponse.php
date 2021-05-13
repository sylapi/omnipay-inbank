<?php

namespace Omnipay\InBank\Message;


use Omnipay\InBank\Message\AbstractResponse;

class ContractCancelResponse extends AbstractResponse
{   
    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }
}
