<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class AccountFacade
 */
class SubAccountFacade
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
     * @var string $displayName
     * @SerializedName("DisplayName")
     * @Type("string")
     */
    public $displayName;

    /**
     * @var bool $isDefault
     * @SerializedName("IsDefault")
     * @Type("boolean")
     */
    public $isDefault;

    /**
     * @var DateTime $created_at
     * @SerializedName("CreationDate")
     * @Type("DateTime<'Y-m-d\TH:i:s'>")
     */
    public $created_at;
}
