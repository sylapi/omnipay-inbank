<?php

namespace Omnipay\InBank\Message;


use Omnipay\InBank\Message\AbstractResponse;

class PingResponse extends AbstractResponse
{   
    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }
}
