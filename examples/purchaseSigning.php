<?php
require __DIR__ . '/../vendor/autoload.php';

use Omnipay\Omnipay;
use Omnipay\InBank\Enums\SigningMethod;

$gateway = Omnipay::create('InBank');
$gateway->setApiKey('--APIKEY--');
$gateway->setShopUidd('--SHOPUIDD--');
$gateway->setTestMode(true);

try {
    $response = $gateway->purchaseSigning([
            'applicationUuid' => '11111111-1111-1111-1111-111111111111',
            'signingMethod' => SigningMethod::DIGITAL
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