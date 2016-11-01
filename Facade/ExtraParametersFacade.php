<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class ExtraParametersFacade
 */
class ExtraParametersFacade
{
    /**
     * @var string $reference
     * @SerializedName("Reference")
     * @Type("string")
     */
    public $reference;

    /**
     * @var string $motif
     * @SerializedName("Motif")
     * @Type("string")
     */
    public $motif;
}
