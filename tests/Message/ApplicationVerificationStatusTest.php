<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class ApplicationVerificationStatusTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new ApplicationVerificationStatusRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('ApplicationVerificationStatusSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('pending', $response->getVerificationStatus());
        $this->assertNull($response->getMessage());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('ApplicationVerificationStatusFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('method_does_not_have_a_valid_value', $response->getMessage());
    }    
}