<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class PrintoutTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new PrintoutRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('PrintoutSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
        $this->assertSame('f1560738-f265-4dc5-bc69-15ce846103b2', $response->getTransactionId());
        $this->assertSame($response->getUuid(), $response->getTransactionId());
        $this->assertSame('https://example.url', $response->getLink());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('PrintoutFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('application_not_found', $response->getMessage());
    }
}
