<?php

namespace Omnipay\InBank\Message;


use Omnipay\InBank\Message\AbstractResponse;

class InitContractSigningResponse extends AbstractResponse
{   
    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }
}
