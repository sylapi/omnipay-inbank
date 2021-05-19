<?php
require __DIR__ . '/../vendor/autoload.php';

use Omnipay\Omnipay;
use Omnipay\InBank\Enums\PrintoutType;

$gateway = Omnipay::create('InBank');
$gateway->setApiKey('--APIKEY--');
$gateway->setShopUidd('--SHOPUIDD--');
$gateway->setTestMode(true);

try {
    $response = $gateway->printout([
            'contractUuid' => '11111111-1111-1111-1111-111111111111',
            'printoutType' => PrintoutType::APPLICATION,
            'forceRegeneration' => true
        ])->send();

    if($response->isSuccessful())
    {
        var_dump($response->getData());
        var_dump($response->getUuid());
        var_dump($response->getLink());
    }
    else {
        var_dump($response->getMessage());
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
