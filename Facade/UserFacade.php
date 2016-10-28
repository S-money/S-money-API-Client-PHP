<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Smoney\Smoney\Facade\UserProfileFacade;

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
    * @var AccountsCollectionFacade $accountsCollection
    * @SerializedName("SubAccounts")
    * @Type("ArrayCollection<Smoney\Smoney\Facade\AccountsCollectionFacade>")
    */
    public $AccountsCollection;
}
