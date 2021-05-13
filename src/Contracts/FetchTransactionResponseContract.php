<?php

namespace Omnipay\InBank\Contracts;

interface FetchTransactionResponseContract {
    public function getDecisionStatus(): ?string;
    public function isDecisionStatusPositive(): bool;
    public function getPaymentSchedule(): ?array;
}
