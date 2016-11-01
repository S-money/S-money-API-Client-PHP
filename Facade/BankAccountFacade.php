<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

/**
 * Class BankAccountFacade
 */
class BankAccountFacade
{
    /**
     * @var int $id
     * @SerializedName("Id")
     * @Type("integer")
     */
    public $id;

    /**
     * @var string $displayName
     * @SerializedName("DisplayName")
     * @Type("string")
     */
    public $displayName;

    /**
     * @var string $bic
     * @SerializedName("Bic")
     * @Type("string")
     */
    public $bic;

    /**
     * @var string $iban
     * @SerializedName("Iban")
     * @Type("string")
     */
    public $iban;

    /**
     * @var bool $isMine
     * @SerializedName("IsMine")
     * @Type("boolean")
     */
    public $isMine;
}
