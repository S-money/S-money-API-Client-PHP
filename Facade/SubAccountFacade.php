<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class SubAccountFacade
 */
class SubAccountFacade
{
    /**
     * @var int $id
     * @SerializedName("Id")
     * @Type("integer")
     */
    public $id;

    /**
     * @var string $appAccountId
     * @SerializedName("AppAccountId")
     * @Type("string")
     */
    public $appAccountId;

    /**
     * @var int $amount
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
