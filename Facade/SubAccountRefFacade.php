<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class SubAccountRefFacade
 */
class SubAccountRefFacade
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
     * @var string $displayName
     * @SerializedName("DisplayName")
     * @Type("string")
     */
    public $displayName;

    /**
     * @var string $href
     * @SerializedName("Href")
     * @Type("string")
     */
    public $href;
}
