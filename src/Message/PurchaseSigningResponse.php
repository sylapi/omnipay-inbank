<?php

namespace Omnipay\InBank\Message;


use Omnipay\InBank\Message\AbstractResponse;

class PurchaseSigningResponse extends AbstractResponse
{   
    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }
}
