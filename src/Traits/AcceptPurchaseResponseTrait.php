<?php

namespace Omnipay\InBank\Traits;

trait AcceptPurchaseResponseTrait {

    public function getContractUuid(): string
    {
        $data = $this->getData();
        
        $contractUuid = null;
        if (
            isset($data['contract'])
            && isset($data['contract']['uuid'])
        ) {
            $contractUuid = $data['contract']['uuid'];
        }

        return $contractUuid;
    }
}