<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class CancelPurchaseTest extends TestCase
{
    protected $request;

    public function setUp(): void
    {
        $this->request = new CancelPurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('CancelPurchaseSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('CancelPurchaseFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('can_not_cancel', $response->getMessage());
    }    
}