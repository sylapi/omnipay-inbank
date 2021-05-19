# Omnipay: InBank

![PHPStan](https://img.shields.io/badge/PHPStan-level%205-brightgreen.svg?style=flat) [![Build](https://github.com/sylapi/omnipay-inbank/actions/workflows/build.yaml/badge.svg?event=push)](https://github.com/sylapi/omnipay-inbank/actions/workflows/build.yaml) [![codecov.io](https://codecov.io/github/sylapi/omnipay-inbank/coverage.svg)](https://codecov.io/github/sylapi/omnipay-inbank/)

## Init

```php
$gateway = Omnipay::create('InBank');
$gateway->setApiKey('--APIKEY--');
$gateway->setShopUidd('--SHOPUIDD--');
$gateway->setTestMode(true);
```

## Ping

```php
try {
    $response = $gateway->ping()->send();
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
```

## Purchase

```php
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
```


## Purchase Signing

```php
use Omnipay\InBank\Enums\SigningMethod;

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
```

## Fetch Transaction

```php
use Omnipay\InBank\Enums\SigningMethod;

try {
    $response = $gateway->fetchTransaction([ 
            'applicationUuid' => '11111111-1111-1111-1111-111111111111'
        ])->send();

    if($response->isSuccessful())
    {
        var_dump($response->getData());
        var_dump($response->getPaymentSchedule());
    } 
    else {
        var_dump($response->getMessage());
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
```

## Accept Purchase

```php
try {
    $response = $gateway->acceptPurchase([
            'applicationUuid' => '11111111-1111-1111-1111-111111111111'
        ])->send();

    if($response->isSuccessful())
    {
        var_dump($response->getData());
        var_dump($response->getContractUuid());
    } 
    else {
        var_dump($response->getMessage());
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
```

## Cancel Purchase

```php
try {
    $response = $gateway->cancelPurchase([
            'applicationUuid' => '11111111-1111-1111-1111-111111111111'
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
```

## Contract Printout

```php
try {
    $response = $gateway->getContractPrintout([
            'contractUuid' => '11111111-1111-1111-1111-111111111111'
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
```

## Init Contract Signing

```php
use Omnipay\InBank\Enums\SigningMethod;

try {
    $response = $gateway->initContractSigning([
            'contractUuid' => '11111111-1111-1111-1111-111111111111',
            'signingMethod' => SigningMethod::SMS
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
```

## Contract Signing

```php
use Omnipay\InBank\Enums\SigningMethod;

try {
    $response = $gateway->contractSigning([
            'contractUuid' => '11111111-1111-1111-1111-111111111111',
            'confirmationCode' => '561085',
            'signingMethod' => SigningMethod::SMS
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
```

## Contract Cancel

```php
use Omnipay\InBank\Enums\SigningMethod;

try {
    $response = $gateway->contractCancel([
        'contractUuid' => '11111111-1111-1111-1111-111111111111'
    ])->send();

    if(!$response->isSuccessful())
    {
        var_dump($response->getMessage());
    }
    
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
```

## Verification Application

```php
use Omnipay\InBank\Enums\VerificationMethod;

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
```

## Verification Application Status

```php
use Omnipay\InBank\Enums\VerificationMethod;

try {
    $response = $gateway->applicationVerificationStatus([
            'applicationUuid' => '11111111-1111-1111-1111-111111111111',
            'verificationMethod' => VerificationMethod::BLUE_MEDIA
        ])->send();

    if($response->isSuccessful())
    {
        var_dump($response->getData());
        var_dump($response->getVerificationStatus());
    } 
    else {
        var_dump($response->getMessage());
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
```

## Contract Merchant Approval

```php

try {
    $response = $gateway->contractMerchantApproval([
            'contractUuid' => '11111111-1111-1111-1111-111111111111'
        ])->send();

    if(!$response->isSuccessful())
    {
        var_dump($response->getMessage());
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
```

## Calculations

```php
use Omnipay\InBank\Enums\ResponeLevel;
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
```

## Product Details

```php

try {
    $response = $gateway->productDetails([
        'productCode' => 'hirepurchase_epos_0.0%_11111111'
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
```

## Fetch Customer

```php
try {
    $response = $gateway->fetchCustomer([
            'applicationUuid' => '11111111-1111-1111-1111-111111111111'
        ])->send();
    if($response->isSuccessful())
    {
        var_dump($response->getData());
        var_dump($response->getPaymentSchedule());
    } 
    else {
        var_dump($response->getMessage());
    }
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
```

## Get Payment Schedule of Credit Application

```php
use Omnipay\InBank\Enums\PaymentSchedulesResponeLevel;

try {
    $response = $gateway->paymentSchedule([
        'applicationUuid' => '11111111-1111-1111-1111-111111111111',
        'responseLevel' => PaymentSchedulesResponeLevel::FULL
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
```

## Recalculate Payment Schedule

```php
use Omnipay\InBank\Enums\PaymentSchedulesResponeLevel;

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
```

## Commands

| COMMAND | DESCRIPTION |
| ------ | ------ |
| composer tests | Tests |
| composer phpstan |  PHPStan |
