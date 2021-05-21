<?php

namespace Omnipay\InBank\Contracts;

interface PrintoutResponseContract
{
    public function getUuid(): ?string;
    public function getLink(): ?string;
}
