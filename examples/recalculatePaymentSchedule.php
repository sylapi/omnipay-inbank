<?php
require __DIR__ . '/../vendor/autoload.php';

use Omnipay\Omnipay;

$gateway = Omnipay::create('InBank');
$gateway->setApiKey('--APIKEY--');
$gateway->setShopUidd('--SHOPUIDD--');
$gateway->setTestMode(true);

try {
    $response = $gateway->recalculatePaymentSchedule([
        'applicationUuid' => '11111111-1111-1111-1111-111111111111',
        'downPaymentAmount' => 1000
    ])->send();
    if($response->isSuccessful())
    {
        var_dump($response->getData());
        var_dump($response->getTransactionId());
        var_dump($response->getApplicationUuid());
    }
    else {
        var_dump($response->getMessage());
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
