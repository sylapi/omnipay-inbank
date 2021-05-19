<?php

namespace Omnipay\InBank\Message;

use Omnipay\Tests\TestCase;

class PaymentScheduleTest extends TestCase
{
    protected $request;

    public function setUp()
    {
        $this->request = new PaymentScheduleRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testSendSuccessXXXXXX()
    {
        $this->setMockHttpResponse('PaymentScheduleSuccess.txt');
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getMessage());
        $this->assertSame('11d11011-101b-1e01-1ed1-ca111111f11', $response->getTransactionId());
        $this->assertSame($response->getApplicationUuid(), $response->getTransactionId());
    }

    public function testSendError()
    {
        $this->setMockHttpResponse('PaymentScheduleFailure.txt');
        $response = $this->request->send();
        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('payment_schedule_not_found,application_not_found', $response->getMessage());
    }
}
