<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class FetchCustomerTest extends TestCase
{
    protected $request;

    public function setUp(): void
    {
        $this->request = new FetchCustomerRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('FetchCustomerSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
        $this->assertNotNull($response->getData());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('FetchCustomerFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('application_not_found', $response->getMessage());
    }    
}