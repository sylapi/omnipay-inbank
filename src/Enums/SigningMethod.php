<?php

namespace Omnipay\InBank\Enums;

class SigningMethod extends AbstractEnum
{
    const SMS = 'sms';
    const DIGITAL = 'digital';
    const PAPER = 'paper';
}