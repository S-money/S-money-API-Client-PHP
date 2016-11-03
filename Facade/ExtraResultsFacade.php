<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class ExtraResultsFacade
 */
class ExtraResultsFacade
{
    /**
     * @var int $bankAuthResult
     * @SerializedName("BankAuthResult")
     * @Type("integer")
     */
    public $bankAuthResult;

    /**
     * @var int $riskControlResult
     * @SerializedName("RiskControlResult")
     * @Type("integer")
     */
    public $riskControlResult;

    /**
     * @var int $threedsResult
     * @SerializedName("ThreedsResult")
     * @Type("integer")
     */
    public $threedsResult;

    /**
     * @var bool $warrantyResult
     * @SerializedName("WarrantyResult")
     * @Type("boolean")
     */
    public $warrantyResult;
}
