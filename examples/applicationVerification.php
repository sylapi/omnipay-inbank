<?php
require __DIR__ . '/../vendor/autoload.php';

use Omnipay\Omnipay;
use Omnipay\InBank\Enums\VerificationMethod;

$gateway = Omnipay::create('InBank');
$gateway->setApiKey('--APIKEY--');
$gateway->setShopUidd('--SHOPUIDD--');
$gateway->setTestMode(true);
try {
    $response = $gateway->applicationVerification([
            'applicationUuid' => '11111111-1111-1111-1111-111111111111',
            'uuid' => '11111111-1111-1111-1111-111111111111',
            'verificationMethod' => VerificationMethod::BLUE_MEDIA,
            'returnUrl' => 'http://test.shop.dev/returnUrl.php'
        ])->send();

    if($response->isSuccessful())
    {
        var_dump($response->getData());
        if($response->isRedirect()) {
            var_dump($response->getRedirectUrl());
            $response->redirect();
        }
    } 
    else {
        var_dump($response->getMessage());
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}