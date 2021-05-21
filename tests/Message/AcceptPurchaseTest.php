<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class AcceptPurchaseTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new AcceptPurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('AcceptPurchaseSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
        $this->assertSame('f4874353-6bb3-4dc8-a25a-3b1c000000000', $response->getTransactionId());
        $this->assertSame($response->getContractUuid(), $response->getTransactionId());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('AcceptPurchaseFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('application_is_not_positive', $response->getMessage());
    }    
}