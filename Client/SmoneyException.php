<?php

namespace Smoney\Smoney\Client;

use Exception;

/**
 * Class SmoneyException
 */
class SmoneyException extends Exception
{
    /**
     * @var int $httpCode
     */
    private $httpCode;

    /**
     * @param string $message
     * @param int    $code
     * @param int    $httpCode
     */
    public function __construct($message, $code, $httpCode)
    {
        parent::__construct($message, $code);
        $this->httpCode = $httpCode;
    }

    public function getHttpCode()
    {
        return $this->httpCode;
    }
}
