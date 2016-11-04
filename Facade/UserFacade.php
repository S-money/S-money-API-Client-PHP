<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Smoney\Smoney\Facade\UserProfileFacade;
use Smoney\Smoney\Facade\SubAccountFacade;
use Smoney\Smoney\Facade\BankAccountRefFacade;
use Smoney\Smoney\Facade\CbCardFacade;
use Smoney\Smoney\Facade\CompanyFacade;

/**
 * Class UserProfileFacade
 */
class UserFacade
{
    /**
     * @var int $id
     * @SerializedName("Id")
     * @Type("integer")
     */
    public $id;

    /**
     * @var string $appUserId
     * @SerializedName("AppUserId")
     * @Type("string")
     */
    public $appUserId;

    /**
     * @var int $role
     * @SerializedName("Role")
     * @Type("integer")
     */
    public $role;

    /**
     * @var int $type
     * @SerializedName("Type")
     * @Type("integer")
     */
    public $type;

    /**
     * @var int $amount
     * @SerializedName("Amount")
     * @Type("integer")
     */
    public $amount;

    /**
    * @var UserProfileFacade $Profile
    * @SerializedName("Profile")
    * @Type("Smoney\Smoney\Facade\UserProfileFacade")
    */
    public $profile;

    /**
    * @var SubAccountsCollectionFacade $subAccounts
    * @SerializedName("SubAccounts")
    * @Type("ArrayCollection<Smoney\Smoney\Facade\SubAccountFacade>")
    */
    public $subAccounts;

    /**
    * @var BankAccountRefsCollectionFacade $bankAccounts
    * @SerializedName("BankAccountRef")
    * @Type("ArrayCollection<Smoney\Smoney\Facade\BankAccountRefFacade>")
    */
    public $bankAccounts;

    /**
    * @var CbCardsCollectionFacade $cbCards
    * @SerializedName("CbCards")
    * @Type("ArrayCollection<Smoney\Smoney\Facade\CbCardFacade>")
    */
    public $cbCards;

    /**
    * @var int $status
    * @SerializedName("Status")
    * @Type("integer")
    */
    public $status;

    /**
    * @var CompanyFacade $company
    * @SerializedName("Company")
    * @Type("Smoney\Smoney\Facade\CompanyFacade")
    */
    public $company;
}
