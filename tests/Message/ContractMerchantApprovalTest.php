<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class ContractMerchantApprovalTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new ContractMerchantApprovalRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('ContractMerchantApprovalSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('ContractMerchantApprovalFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('can_not_approve', $response->getMessage());
    }    
}