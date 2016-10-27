<?php

namespace Client;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerBuilder;

abstract class AbstractClient
{
	protected $baseUrl;
    protected $headers;
    protected $httpClient;
    protected $serializer;
    

	public function __construct($baseUrl, array $headers, Client $httpClient, SerializerBuilder $serializerBuilder)
    {
        $this->setBaseUrl($baseUrl);
        $this->setHeaders($headers);
        $this->setClient($httpClient);
        $this->setSerializer($serializerBuilder);
        
    }

    public function setBaseUrl($baseUrl)
    {
        return ($this->baseUrl = $baseUrl);
    }

    public function setClient($httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    public function setSerializer($serializer)
    {
        $this->serializer = $serializer->build();
        return $this;
    }

    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }


    // getters à conf ? va t on avoir besoin de récup le toke 


    protected static function isReponseValid($result)
    {
        if ($result == false
            || !isset($result['content'])
            || (isset($result['content']['Code']) && $result['content']['Code'] != null)
            || (isset($result['content']['Message']) && $result['content']['Message'] == 'The request is invalid.')) {
            return false;
        }

        return true;
    }
}