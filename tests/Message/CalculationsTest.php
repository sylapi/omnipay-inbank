<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class CalculationsTest extends TestCase
{
    protected $request;

    public function setUp(): void
    {
        $this->request = new PurchaseSigningRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('CalculationsSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertNotNull($response->getData());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('CalculationsFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('product_code_is_missing', $response->getMessage());
    }    
}