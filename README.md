S-Money library
===============

## User
```php
    $userClient = new UserClient(
        'https://rest-pp.s-money.fr/api/sandbox',
        $token,
        $version,
        new Client(),
        SerializerBuilder::create()->build()
    );
```
### Create Simple User

To create simple user and its attributes
```php
    $user = new UserFacade();
    $user->appUserId = 'ALFRED';
    
    /* Then, more complex attributes */
    
    /* profile attribute */
    $user->profile = $userProfileFacade();
    $user->profile = new UserProfileFacade();
    $user->profile->firstName = 'toto';
    $user->profile->lastName = 'foo';
    $user->profile->birthdate = new DateTime('1989-08-02T00:00:00', new DateTimeZone('Europe/Paris'));

    /* address attribute which is UserFacade::$profile attribute */
    $user->profile->address = new AddressFacade();
    $user->profile->adress->country = 'US';

    /* Then we POST the $user */
    $userClient->create($user);
```

### Business User

you only need to set the `$type` attribute of the 'UserFacade' to `2` and the set `company` attribute with `$name` and `$siret` :
```php
    $user->type = 2;
    $user->company = new CompanyFacade();
    $user->company->name = 'HELLO LTD';
    $user->company->siret = 'XXXXXXXX';
```

## CardPayment
```php
    $cardPaymentClient = new CardPaymentClient(
        'https://rest-pp.s-money.fr/api/sandbox',
        $token,
        $version,
        new Client(),
        SerializerBuilder::create()->build()
    );
```    
### Simple Payment
```php
    $cardPayment = new CardPaymentFacade();

    $cardPayment->urlReturn = 'http://callback_after_payment.com';
    $cardPayment->amount = 2;
    $cardPayment->beneficiary = new subAccountFacade();
    $cardPayment->beneficiary->appAccountId = 'client-112';
    
    $cardPaymentClient->create($cardPayment);
```

### Multiple beneficiaries

(set api to v2 in the version)
```php
    $cardPayment = new CardPaymentFacade();
    $cardPayment->urlReturn = 'http://callback_after_payment.com';
    $cardPayment->payments = new ArrayCollection();

    $first = new PaymentFacade();
    $first->beneficiary = new subAccountFacade();
    $first->beneficiary->appAccountId = 'ALFRED';
    $first->amount = 15;

    $cardPayment->payments->add($first);

    $second = new PaymentFacade;
    ...
    $cardPayment->payments->add($second);

    $cardPaymentClient->create($cardPayment);
```
### Get one CardPayment by id
```php
    $cardPaymentClient->get($orderId);
```
### List all CardPayments
```php
    $cardPaymentClient->index();
```

## Payout
```php
    $payoutClient = new PayoutClient(
        'https://rest-pp.s-money.fr/api/sandbox',
        $token,
        $version,
        new Client(),
        SerializerBuilder::create()->build()
    );
```

### Create Payout
```php
    $payout = new PayoutFacade();
    $payout->orderId = 'hello';
    $payout->amount = 99;
    $payout->bankAccount = new BankAccountFacade;
    $payout->bankAccount->id = 25923;
    
    $payoutClient->create('appUserId of the payer', $payout);
```

## Payment
```php
    $paymentClient = new PaymentClient(
        'https://rest-pp.s-money.fr/api/sandbox',
        $token,
        $version,
        new Client(),
        SerializerBuilder::create()->build()
    );
```

### Create Payment
```php
    $payment->beneficiary = new SubAccountRefFacade();
    $payment->beneficiary->appAccountId = 'YOUR PAL';
    $payment->sender = new SubAccountRefFacade();
    $payment->sender->appAccountId = 'ALFRED';
    $payment->amount = 99;
```
