<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class UserProfileFacade
 */
class UserFacade
{
    /**
     * @var integer $id
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
     * @var integer $role
     * @SerializedName("Role")
     * @Type("integer")
     */
    public $role;

    /**
     * @var integer $type
     * @SerializedName("Type")
     * @Type("integer")
     */
    public $type;

    /**
     * @var integer $amount
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
    * @var integer $status
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
