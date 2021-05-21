<?php

namespace Omnipay\InBank\Message;

use Omnipay\InBank\Contracts;
use Omnipay\InBank\Traits;

abstract class AbstractRequest 
    extends \Omnipay\Common\Message\AbstractRequest 
    implements Contracts\ApiContract
{
    use Traits\ApiTrait;
}