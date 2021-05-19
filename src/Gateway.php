<?php

namespace Omnipay\InBank;

use Omnipay\Common\AbstractGateway;
use Omnipay\InBank\Traits;
use Omnipay\InBank\Message;
use Omnipay\InBank\Contracts;

class Gateway extends AbstractGateway implements Contracts\ApiContract
{
    use Traits\ApiTrait;

    public function getName()
    {
        return 'InBank';
    }

    public function getDefaultParameters()
    {
        return [
            'apiKey'        => '',
            'shopUidd'     => '',
            'testMode'     => true
        ];
    }

    public function ping(array $options = [])
    {
        return parent::createRequest(Message\PingRequest::class, $options);
    }

    public function fetchTransaction(array $options = [])
    {
        return parent::createRequest(Message\FetchTransactionRequest::class, $options);
    }

    public function purchase(array $options = [])
    {
        return parent::createRequest(Message\PurchaseRequest::class, $options);
    }

    public function purchaseSigning(array $options = [])
    {
        return parent::createRequest(Message\PurchaseSigningRequest::class, $options);
    }

    public function acceptPurchase(array $options = [])
    {
        return parent::createRequest(Message\AcceptPurchaseRequest::class, $options);
    }

    public function cancelPurchase(array $options = [])
    {
        return parent::createRequest(Message\CancelPurchaseRequest::class, $options);
    }

    public function getContractPrintout(array $options = [])
    {
        return parent::createRequest(Message\ContractPrintoutRequest::class, $options);
    }

    public function initContractSigning(array $options = [])
    {
        return parent::createRequest(Message\InitContractSigningRequest::class, $options);
    }

    public function contractSigning(array $options = [])
    {
        return parent::createRequest(Message\ContractSigningRequest::class, $options);
    }

    public function contractCancel(array $options = [])
    {
        return parent::createRequest(Message\ContractCancelRequest::class, $options);
    }

    public function applicationVerification(array $options = [])
    {
        return parent::createRequest(Message\ApplicationVerificationRequest::class, $options);
    }

    public function applicationVerificationStatus(array $options = [])
    {
        return parent::createRequest(Message\ApplicationVerificationStatusRequest::class, $options);
    }

    public function contractMerchantApproval(array $options = [])
    {
        return parent::createRequest(Message\ContractMerchantApprovalRequest::class, $options);
    }

    public function fetchContract(array $options = [])
    {
        return parent::createRequest(Message\FetchContractRequest::class, $options);
    }

    public function calculations(array $options = [])
    {
        return parent::createRequest(Message\CalculationsRequest::class, $options);
    }

    public function productDetails(array $options = [])
    {
        return parent::createRequest(Message\ProductDetailsRequest::class, $options);
    }

    public function fetchCustomer(array $options = [])
    {
        return parent::createRequest(Message\FetchCustomerRequest::class, $options);
    }

    public function  paymentSchedule (array $options = [])
    {
        return parent::createRequest(Message\PaymentScheduleRequest::class, $options);
    }
}
