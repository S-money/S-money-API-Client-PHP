<?php

namespace Smoney\Smoney\Client;

use GuzzleHttp\Client;
use JMS\Serializer\Serializer;

/**
 * Class AbstractClient
 */
abstract class AbstractClient
{
    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var httpClient
     */
    protected $httpClient;

    /**
     * @var Serializer
     */
    protected $serializer;    


    /**
     * @param string $baseUrl
     * @param array $headers
     */
    public function __construct($baseUrl, array $headers, Client $httpClient, Serializer $serializer)
    {
        $this->baseUrl = $baseUrl;
        $this->setHeaders($headers);
        $this->httpClient = $httpClient;
        $this->serializer = $serializer;
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }
}
