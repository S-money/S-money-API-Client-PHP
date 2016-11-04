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
    protected function action($httpVerb, $uri, $body = null, $multipart = null)
    {
        if (!$multipart) {
            $options = ['headers' => $this->headers, 'body' => $body];
        } else {
            $options = [
                'headers' => [
                    'Authorization' => $this->headers['Authorization'],
                    'Accept' => $this->headers['Accept'],
                ],
                'multipart' => $multipart
            ];
        }

        return $this->httpClient
                ->request(strtoupper($httpVerb), $this->baseUrl.'/'.$uri, $options)
                ->getBody()
                ->getContents();
    }
}
