<?php

namespace Omnipay\InBank\Traits;

trait ApiTrait {

    public function getApiKey(): ?string
    {
        return $this->getParameter('apiKey');
    }

    public function setApiKey(string $value)
    {
        return $this->setParameter('apiKey', $value);
    }

    public function getShopUidd(): ?string
    {
        return $this->getParameter('shopUidd');
    }

    public function setShopUidd(string $value)
    {
        return $this->setParameter('shopUidd', $value);
    }


    public function getApiUrlProduction(): ?string
    {
        return $this->getParameter('apiUrlProduction');
    }

    public function setApiUrlProduction(string $value)
    {
        return $this->setParameter('apiUrlProduction', $value);
    }    

    public function getApiUrlSandbox(): ?string
    {
        return $this->getParameter('apiUrlSandbox');
    }

    public function setApiUrlSandbox(string $value)
    {
        return $this->setParameter('apiUrlSandbox', $value);
    }    

    public function getHeaders(array $append = []): array
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        return array_merge($headers,$append);
    }

    public function getHeaderAuthorization()
    {
        return [
            'Authorization' => 'Bearer '. $this->getApiKey()
        ];
    }

    public function getEndpoint(string $path, array $search = [], array $replace = []): string
    {
        return $this->getApiUrl().str_replace($search, $replace, $path);
    }

    public function getApiUrl(): string
    {
        if ($this->getTestMode()) {
            return $this->getApiUrlSandbox() ?? 'https://demo-api.inbank.pl';
        } else {
            return $this->getApiUrlProduction() ?? 'https://api.inbank.pl';
        }
    }
}
