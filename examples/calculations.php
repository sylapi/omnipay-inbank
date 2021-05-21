<?php
require __DIR__ . '/../vendor/autoload.php';

use Omnipay\Omnipay;
use Omnipay\InBank\Enums\ResponeLevel;

$gateway = Omnipay::create('InBank');
$gateway->setApiKey('--APIKEY--');
$gateway->setShopUidd('--SHOPUIDD--');
$gateway->setTestMode(true);

try {
    $response = $gateway->calculations([ 
        'productCode' => 'hirepurchase_epos_0.8%_11111111',
        'amount' => 7000,
        'period' => 12,
        'downPaymentAmount' => 1500,
        'paymentDay' => 4,
        'responseLevel' => ResponeLevel::SIMPLE,
    ])->send();

    if($response->isSuccessful())
    {
        var_dump($response->getData());
    } 
    else {
        var_dump($response->getMessage());
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}