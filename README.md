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

### Simple User

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

    $cardPayment = new CardPaymentFacade();

    $cardPayment->urlReturn = 'http://rienrien.com';
    $cardPayment->amount = 2;
    $cardPayment->beneficiary = new subAccountFacade();
    $cardPayment->beneficiary->appAccountId = 'client-112';
    
    $cardPaymentClient->create($cardPayment);

