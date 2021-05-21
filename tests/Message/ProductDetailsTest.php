<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class ProductDetailsTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new ProductDetailsRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('ProductDetailsSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('ProductDetailsFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('product_not_found', $response->getMessage());
    }    
}