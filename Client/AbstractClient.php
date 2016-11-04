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
     * @param Client $httpClient
     * @param Serializer $serializer
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

    /**
     * @param string $httpVerb
     * @param string $uri
     * @param string $body
     */
    protected function action($httpVerb, $uri, $extraParams = [], $customHeaders = [])
    {
        $options = [];
        $options['headers'] = $this->headers;
        
        foreach ($extraParams as $key => $value) {
            $options[$key] = $value;
        }

        foreach ($customHeaders as $key => $value) {
            $options['headers'][$key] = $value;
            if ($value === null) {
                unset($options['headers'][$key]);
            }
        }

        return $this->httpClient
                ->request(strtoupper($httpVerb), $this->baseUrl.'/'.$uri, $options)
                ->getBody()
                ->getContents();
    }
}
