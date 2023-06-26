<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class PingTest extends TestCase
{
    protected $request;

    public function setUp(): void
    {
        $this->request = new PingRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('PingSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
    }
}