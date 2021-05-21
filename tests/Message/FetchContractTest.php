<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class FetchContractTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new FetchContractRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('FetchContractSuccess.txt');
        $response = $this->request->send();
        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
        $this->assertSame('11d1baeb-1da1-1c01-b111-12111211c1a1', $response->getTransactionId());
        $this->assertSame($response->getContractUuid(), $response->getTransactionId());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('FetchContractFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('contract_not_found', $response->getMessage());
    }    
}