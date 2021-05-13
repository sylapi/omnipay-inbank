<?php

namespace Omnipay\InBank\Message;


use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

class FetchTransactionResponse  extends AbstractResponse
    implements Contracts\FetchTransactionResponseContract
{
    use Traits\FetchTransactionResponseTrait;
    
    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }
}
