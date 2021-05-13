<?php

namespace Omnipay\InBank\Message;


use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class FetchContractResponse  extends AbstractResponse
{
    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }
}
