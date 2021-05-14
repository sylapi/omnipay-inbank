<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class ContractPrintoutTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new ContractPrintoutRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('ContractPrintoutSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
        $this->assertSame('f1560738-f265-4dc5-bc69-15ce846103b2', $response->getTransactionId());
        $this->assertSame($response->getContractUuid(), $response->getTransactionId());
        $this->assertSame('https://example.url', $response->getLink());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('ContractPrintoutFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('contract_not_found', $response->getMessage());
    }    
}