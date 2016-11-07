# User

    $headers = array(
        'Authorization' => 'Bearer NTsyODY7U1B1SUk2Rkx6ag==',
        'Accept' => 'application/vnd.s-money.v1+json',
        'Content-Type' => 'application/vnd.s-money.v1+json'
    );

    $userClient = new UserClient(
        'https://rest-pp.s-money.fr/api/sandbox',
        $headers,
        new Client(),
        SerializerBuilder::create()->build()
    );

### Create Simple User

To create simple user and its attributes

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


### Business User

you only need to set the `$type` attribute of the 'UserFacade' to `2` and the set `company` attribute with `$name` and `$siret` :

    $user->type = 2;
    $user->company = new CompanyFacade();
    $user->company->name = 'HELLO LTD';
    $user->company->siret = 'XXXXXXXX';


# CardPayment

    $cardPaymentClient = new CardPaymentClient(
        'https://rest-pp.s-money.fr/api/sandbox',
        $headers,
        new Client(),
        SerializerBuilder::create()->build()
    );
### Simple Payment

    $cardPayment = new CardPaymentFacade();

    $cardPayment->urlReturn = 'http://callback_after_payment.com';
    $cardPayment->amount = 2;
    $cardPayment->beneficiary = new subAccountFacade();
    $cardPayment->beneficiary->appAccountId = 'client-112';
    
    $cardPaymentClient->create($cardPayment);


### Multiple beneficiaries

(set api to v2 in the array of headers)

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

### Get one CardPayment by id

    $cardPaymentClient->get($orderId);

### List all CardPayments

    $cardPaymentClient->index();


# Payout
    $payoutClient = new PayoutClient(
        'https://rest-pp.s-money.fr/api/sandbox',
        $headers,
        new Client(),
        SerializerBuilder::create()->build()
    );


### Create Payout

    $payout = new PayoutFacade();
    $payout->orderId = 'hello';
    $payout->amount = 99;
    $payout->bankAccount = new BankAccountFacade;
    $payout->bankAccount->id = 25923;
    
    $payoutClient->create('appUserId of the payer', $payout);


# Payment

    $paymentClient = new PaymentClient(
        'https://rest-pp.s-money.fr/api/sandbox',
        $headers,
        new Client(),
        SerializerBuilder::create()->build()
    );


### Create Payment

    $payment->beneficiary = new SubAccountRefFacade();
    $payment->beneficiary->appAccountId = 'YOUR PAL';
    $payment->sender = new SubAccountRefFacade();
    $payment->sender->appAccountId = 'ALFRED';
    $payment->amount = 99;
