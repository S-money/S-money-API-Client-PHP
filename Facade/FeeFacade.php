<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class FeeFacade
 */
class FeeFacade
{
    /**
     * @var int $amount
     * @SerializedName("Amount")
     * @Type("integer")
     */
    public $amount;

    /**
     * @var float $vat
     * @SerializedName("VAT")
     * @Type("double")
     */
    public $vat;

    /**
     * @var int $amountWithVat
     * @SerializedName("AmountWithVAT")
     * @Type("integer")
     */
    public $amountWithVat;


    /**
     * @var int $status
     * @SerializedName("Status")
     * @Type("integer")
     */
    public $status;
}
