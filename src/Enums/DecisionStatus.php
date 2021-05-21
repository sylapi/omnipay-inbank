<?php

namespace Omnipay\InBank\Enums;

class DecisionStatus extends AbstractEnum
{
    const PENDING = 'pending';
    const POSITIVE = 'positive';
    const MANUAL_NEGATIVE = 'manual_negative';
    const INCOME_PROOF_REQUIRED = 'income_proof_required';
    const NEGATIVE = 'negative';
    const FAILED = 'failed';
}