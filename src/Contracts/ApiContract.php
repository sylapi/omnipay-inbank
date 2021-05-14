<?php

namespace Omnipay\InBank\Contracts;

interface ApiContract {
    public function getApiKey(): ?string;
    public function setApiKey(string $value);

    public function getShopUidd(): ?string;
    public function setShopUidd(string $value);

    public function getHeaders(array $append = []): array;
    public function getEndpoint(string $path, array $search = [], array $replace = []): string;
    public function getApiUrl():string;
}
