<?php

namespace Omnipay\InBank;

use Omnipay\Tests\GatewayTestCase;


class ChargeGatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
    }
}