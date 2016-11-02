<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Smoney\Smoney\Facade\VoucherCopyFacade;

/**
 * Class KycFacade
 */
class KycFacade
{
    /**
     * @var int $id
     * @SerializedName("Id")
     * @Type("integer")
     */
    public $id;

    /**
     * @var DateTime $requestDate
     * @SerializedName("RequestDate")
     * @Type("DateTime<'Y-m-d\TH:i:s'>")
     */
    public $requestDate;

    /**
     * @var int $status
     * @SerializedName("Status")
     * @Type("integer")
     */
    public $status;

    /**
     * @var string $reason
     * @SerializedName("Reason")
     * @Type("string")
     */
    public $reason;

    /**
     * @var VoucherCopiesFacade $voucherCopies
     * @SerializedName("VoucherCopies")
     * @Type("ArrayCollection<Smoney\Smoney\Facade\VoucherCopyFacade>")
     */
    public $voucherCopies;
}
