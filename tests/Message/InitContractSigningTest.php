<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class InitContractSigningTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new InitContractSigningRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('InitContractSigningSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('InitContractSigningFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('can_not_sign', $response->getMessage());
    }    
}