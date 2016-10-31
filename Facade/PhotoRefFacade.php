<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class PhotoRefFacade
 */
class PhotoRefFacade
{
    /**
     * @var string $href
     * @SerializedName("Href")
     * @Type("string")
     */
    public $href;
}
