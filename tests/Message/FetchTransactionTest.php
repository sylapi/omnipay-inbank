<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class FetchTransactionTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new FetchTransactionRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccess()
    {
        $this->setMockHttpResponse('FetchTransactionSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
        $this->assertSame('1e111111-111f-1111-a111-ee1afbf11111', $response->getTransactionId());
        $this->assertSame($response->getApplicationUuid(), $response->getTransactionId());
        $this->assertSame('positive', $response->getDecisionStatus());
        $this->assertTrue($response->isDecisionStatusPositive());
        $this->assertNotNull($response->getPaymentSchedule());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('FetchTransactionFailure.txt');
        $response = $this->request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('application_not_found', $response->getMessage());
    }    
}