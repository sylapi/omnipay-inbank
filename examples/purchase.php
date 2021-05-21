<?php
require __DIR__ . '/../vendor/autoload.php';

use Omnipay\Omnipay;

$gateway = Omnipay::create('InBank');
$gateway->setApiKey('--APIKEY--');
$gateway->setShopUidd('--SHOPUIDD--');
$gateway->setTestMode(true);


try {
    $response = $gateway->purchase([
        'creditApplication' => [
            "product_code" => "hirepurchase_epos_0.0%_e57c6ec8018d",
            "amount" =>  "2000.0",
            "period" => 12,
            "payment_day" => 4,
            "monthly_income" => "4222.11",
            "dependants_count" => "0",
            "monthly_household_costs" => "0.0",
            "income_source" => "pension",
            "payout_account_number" =>  "PL92962000058311149653553838"
        ],
        "customer" => [
            "identity_code" => "50110502242",
            "first_name" => "Example",
            "last_name" => "Customer"
        ],        
        "customerAddresses" => [
            [
                "type" => "legal",
                "country" => "PL",
                "street" => "Fabryczna",
                "house" => "5A",
                "apartment" => "101",
                "zip_code" => "00-100"
            ]
        ],
        "customerContact" => [
            "mobile" => "+48500600700",
            "email" => "test@email.dev"
        ],
        "customerIdentification" => [
            "document_type" => "id_card",
            "document_number" => "XLP255805",
            "document_valid_to" => "2021-08-26"
        ],
        "customerConsents" => [
            "operational_contact_email" => true,
            "inbank_queries_after_contract_expiry" => false,
            "marketing_email" => false,
            "marketing_sms" => false,
            "marketing_phone" => false
        ]
    ])->send();
    if($response->isSuccessful())
    {
        var_dump($response->getData());
        var_dump($response->getTransactionId());
    } 
    else {
        var_dump($response->getMessage());
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
