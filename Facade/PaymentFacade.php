<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Smoney\Smoney\Facade\FeeFacade;
use Smoney\Smoney\Facade\SubAccountRefFacade;

/**
 * Class PaymentFacade
 */
class PaymentFacade
{
    /**
     * @var string $orderId
     * @SerializedName("OrderId")
     * @Type("string")
     */
    public $orderId;

    /**
     * @var int $id
     * @SerializedName("Id")
     * @Type("integer")
     */
    public $id;

    /**
     * @var DateTime $paymentDate
     * @SerializedName("PaymentDate")
     * @Type("DateTime<'Y-m-d\TH:i:s'>")
     */
    public $paymentDate;

    /**
     * @var int $amount
     * @SerializedName("Amount")
     * @Type("integer")
     */
    public $amount;

    /**
     * @var FeeFacade $fee
     * @SerializedName("Fee")
     * @Type("Smoney\Smoney\Facade\FeeFacade")
     */
    public $fee;

    /**
     * @var SubAccountRefFacade $beneficiary
     * @SerializedName("Beneficiary")
     * @Type("Smoney\Smoney\Facade\SubAccountRefFacade")
     */
    public $beneficiary;

    /**
     * @var string $message
     * @SerializedName("Message")
     * @Type("string")
     */
    public $message;

    /**
     * @var string $sender
     * @SerializedName("Sender")
     * @Type("Smoney\Smoney\Facade\SubAccountRefFacade")
     */
    public $sender;

}
