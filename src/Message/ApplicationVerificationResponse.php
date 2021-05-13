<?php

namespace Omnipay\InBank\Message;

use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

class ApplicationVerificationResponse extends AbstractResponse implements RedirectResponseInterface
{   
    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }

    public function isRedirect()
    {
        return $this->isSuccessful();
    }

    public function getRedirectUrl()
    {
        return ($this->isRedirect()) ? $this->data['redirect_url'] : null;
    }
}