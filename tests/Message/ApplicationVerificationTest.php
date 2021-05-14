<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class ApplicationVerificationTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new ApplicationVerificationRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('ApplicationVerificationSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertTrue($response->isRedirect());
        $this->assertSame("https://inbank.ie/verification/?uuid=00001111-ab7f-4af6-81e7-556be94a7a66",$response->getRedirectUrl());
        $this->assertNull($response->getMessage());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('ApplicationVerificationFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('return_url_is_not_valid', $response->getMessage());
    }    
}