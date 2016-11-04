<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class VoucherCopyFacade
 */
class VoucherCopyFacade
{
    /**
     * @var int $id
     * @SerializedName("Id")
     * @Type("integer")
     */
    public $id;

    /**
     * @var string $name
     * @SerializedName("Name")
     * @Type("string")
     */
    public $name;

    /**
     * @var string $type
     * @SerializedName("Type")
     * @Type("string")
     */
    public $type;

    /**
     * @var int $size
     * @SerializedName("Size")
     * @Type("integer")
     */
    public $size;

    /**
     * @var string $href
     * @SerializedName("Href")
     * @Type("string")
     */
    public $href;
}
