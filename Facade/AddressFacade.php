<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class AddressFacade
 */
class AddressFacade
{
    /**
     * @var string $street
     * @SerializedName("Street")
     * @Type("string")
     */
    public $street;

    /**
     * @var string $zipCode
     * @SerializedName("ZipCode")
     * @Type("string")
     */
    public $zipCode;

    /**
     * @var string $city
     * @SerializedName("City")
     * @Type("string")
     */
    public $city;

    /**
     * @var string $country
     * @SerializedName("Country")
     * @Type("string")
     */
    public $country;
}
