<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class CardFacade
 */
class CardFacade
{
    /**
     * @var int $id
     * @SerializedName("Id")
     * @Type("integer")
     */
    public $id;

    /**
     * @var string $appCardId
     * @SerializedName("AppCardId")
     * @Type("string")
     */
    public $appCardId;

    /**
     * @var string $name
     * @SerializedName("Name")
     * @Type("string")
     */
    public $name;

    /**
     * @var string $hint
     * @SerializedName("Hint")
     * @Type("string")
     */
    public $hint;

    /**
     * @var string $country
     * @SerializedName("Country")
     * @Type("string")
     */
    public $country;

    /**
     * @var DateTime $expiryDate
     * @SerializedName("ExpiryDate")
     * @Type("DateTime<'Y-m-d\TH:i:s'>")
     */
    public $expiryDate;
}
