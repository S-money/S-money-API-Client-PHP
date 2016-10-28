<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class AccountFacade
 */
class AccountFacade
{
    /**
     * @var integer $accounts
     * @SerializedName("Id")
     * @Type("string")
     */
    public $id;

    /**
     * @var string $appAccountId
     * @SerializedName("AppAccountId")
     * @Type("string")
     */
    public $appAccountId;

    /**
     * @var integer $amount
     * @SerializedName("Amount")
     * @Type("integer")
     */
    public $amount;

    /**
     * @var string $displayname
     * @SerializedName("DisplayName")
     * @Type("string")
     */
    public $displayname;

    /**
     * @var bool $isDefault
     * @SerializedName("IsDefault")
     * @Type("boolean")
     */
    public $isDefault;

    /**
     * @var DateTime $creationDate
     * @SerializedName("CreationDate")
     * @Type("DateTime<'Y-m-d\TH:i:s'>")
     */
    public $creationDate;

}
