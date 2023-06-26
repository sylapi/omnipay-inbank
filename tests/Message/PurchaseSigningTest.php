<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class PurchaseSigningTest extends TestCase
{
    protected $request;

    public function setUp(): void
    {
        $this->request = new PurchaseSigningRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('PurchaseSigningSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
        $this->assertSame('f4874353-6bb3-4dc8-a25a-3b1c000000000', $response->getTransactionId());
        $this->assertSame($response->getApplicationUuid(), $response->getTransactionId());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('PurchaseSigningFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('can_not_sign', $response->getMessage());
    }    
}