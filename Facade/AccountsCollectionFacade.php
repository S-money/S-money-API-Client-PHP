<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Smoney\Smoney\Facade\AccountFacade;

/**
 * Class AccountsCollectionFacade
 */
class AccountsCollectionFacade
{
    /**
     * @var array $accounts
     * @SerializedName("SubAccounts")
     * @Type("string")
     */
    public $accounts;

    /**
     * @param AccountFacade $account
     */
    public function addAccount(AccountFacade $account)
    {
        $this->accounts[] = $account;
    }
}
