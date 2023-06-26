<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class ContractCancelTest extends TestCase
{
    protected $request;

    public function setUp(): void
    {
        $this->request = new ContractCancelRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('ContractCancelSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('ContractCancelFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('can_not_cancel', $response->getMessage());
    }    
}