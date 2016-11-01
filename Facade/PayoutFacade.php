<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

use Smoney\Smoney\Facade\SubAccountRefFacade;
use Smoney\Smoney\Facade\BankAccountFacade;
use Smoney\Smoney\Facade\FeeFacade;
use Smoney\Smoney\Facade\ExtraParametersFacade;

/**
 * Class PayoutFacade
 */
class PayoutFacade
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
     * @var SubAccountRefFacade $subAccountRef
     * @SerializedName("SubAccountRef")
     * @Type("Smoney\Smoney\Facade\SubAccountRefFacade")
     */
    public $subAccountRef;

    /**
     * @var BankAccountFacade $bankAccount
     * @SerializedName("BankAccount")
     * @Type("Smoney\Smoney\Facade\BankAccountFacade")
     */
    public $bankAccount;

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
     * @var DateTime $operationDate
     * @SerializedName("OperationDate")
     * @Type("DateTime<'Y-m-d\TH:i:s'>")
     */
    public $operationDate;

    /**
     * @var string $message
     * @SerializedName("Message")
     * @Type("string")
     */
    public $message;

    /**
     * @var ExtraParametersFacade $extraParameters
     * @SerializedName("ExtraParameters")
     * @Type("Smoney\Smoney\Facade\ExtraParametersFacade")
     */
    public $extraParameters;
}
