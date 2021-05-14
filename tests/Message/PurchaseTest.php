<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class PurchaseTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('PurchaseSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
        $this->assertSame('d7e7fc76-1191-4301-b94f-3a431b230a21', $response->getTransactionId());
        $this->assertSame($response->getApplicationUuid(), $response->getTransactionId());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('PurchaseFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('credit_application_is_missing,credit_application_is_empty,credit_application_product_code_is_missing', $response->getMessage());
    }    
}