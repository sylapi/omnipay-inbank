<?php

namespace Omnipay\InBank\Traits;

use Omnipay\InBank\Enums\DecisionStatus;

trait FetchTransactionResponseTrait {

    public function getDecisionStatus(): ?string
    {
        $data = $this->getData();
        
        $status = null;
        if (
            isset($data['credit_application'])
            && isset($data['credit_application']['decision_status'])
        ) {
            $status = $data['credit_application']['decision_status'];
        }

        return $status;
    }
       
    public function isDecisionStatusPositive(): bool
    {
        return ($this->getDecisionStatus() === DecisionStatus::POSITIVE);
    }

    public function getPaymentSchedule(): ?array
    {
        $data = $this->getData();

        $schedule = [];
        
        if (isset($data['payment_schedule']) && is_array($data['payment_schedule'])) {
            $schedule = $data['payment_schedule'];
        }

        return $schedule;
    }

}