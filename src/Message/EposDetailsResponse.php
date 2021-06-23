<?php

namespace Omnipay\InBank\Message;

use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\InBank\Message\AbstractResponse;
use Omnipay\InBank\Contracts;

class EposDetailsResponse extends AbstractResponse 
    implements Contracts\ApplicationResponseContract, RedirectResponseInterface, Contracts\ContractResponseContract
{   
    public function isSuccessful()
    {   
        return $this->isSuccessfulResponse();
    }

    public function getTransactionId()
    {
        return $this->getApplicationUuid();
    }

    public function getApplicationUuid(): ?string
    {
        return ($this->isSuccessful()) ? ($this->data['uuid'] ?? null) : null;
    }

    public function getRedirectUrl()
    {
        if (isset($this->data['redirect_url']) && is_string($this->data['redirect_url'])) {
            return $this->data['redirect_url'];
        } else {
            return null;
        }
    }

    public function getContractUuid(): ?string
    {
        if (isset($this->data['credit_contract_uuid']) && is_string($this->data['credit_contract_uuid'])) {
            return (string) $this->data['credit_contract_uuid'];
        } else {
            return null;
        }
    }

    public function getStatus()
    {
        if (isset($this->data['status']) && is_string($this->data['status'])) {
            return $this->data['status'];
        } else {
            return null;
        }
    }

    /**
     * Get the required redirect method (either GET or POST).
     *
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     *
     * @return array
     */
    public function getRedirectData()
    {
        return null;
    }   

    /**
     * Perform the required redirect.
     *
     * @return void
     */
    public function redirect()
    {

    }
}
