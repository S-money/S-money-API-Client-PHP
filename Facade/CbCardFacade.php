<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class CbCardFacade
 */
class CbCardFacade
{
    /**
     * @var integer $id
     * @SerializedName("Id")
     * @Type("integer")
     */
    public $id;

    /**
     * @var string $href
     * @SerializedName("Href")
     * @Type("string")
     */
    public $href;    
}
