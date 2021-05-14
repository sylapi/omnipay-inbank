<?php

namespace Omnipay\InBank\Message;


use Omnipay\InBank\Message\AbstractResponse;

class FetchCustomerResponse  extends AbstractResponse
{
    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }
}
