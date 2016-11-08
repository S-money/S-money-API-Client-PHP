<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class PaymentScheduleFacade
 */
class PaymentScheduleFacade
{
    /**
     * @var int $sequenceNumber
     * @SerializedName("SequenceNumber")
     * @Type("integer")
     */
    public $sequenceNumber;

    /**
     * @var int $amount
     * @SerializedName("Amount")
     * @Type("integer")
     */
    public $amount;

    /**
     * @var DateTime $date
     * @SerializedName("Date")
     * @Type("DateTime<'Y-m-d\TH:i:s'>")
     */
    public $date;

    /**
     * @var int $status
     * @SerializedName("Status")
     * @Type("integer")
     */
    public $status;

    /**
     * @var int $fee
     * @SerializedName("Fee")
     * @Type("integer")
     */
    public $fee;
}
