<?php

namespace Smoney\Smoney\Client;

use GuzzleHttp\Client;
use JMS\Serializer\Serializer;
use Smoney\Smoney\Client\SmoneyException;

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

        

        $res = $this->httpClient
                ->request(strtoupper($httpVerb), $this->baseUrl.'/'.$uri, $options)
                ->getBody()
                ->getContents();

        if (!$this->isReponseValid($res)) {
            return $this->handleError($res);
        }
    }

    protected function isReponseValid($result)
    {
        if ($result == false
            || !isset($result['content'])
            || (isset($result['content']['Code']) && $result['content']['Code'] != null)
            || (isset($result['content']['Message']) && $result['content']['Message'] == 'The request is invalid.')) {
            return false;
        }

        return true;
    }

    protected function handleError($res)
    {
        $Message = 'Erreur inconnue ';
        $ErrorCode = 0;

        if (isset($res['content'])) {
            if (isset($res['content']['ErrorMessage'])) {
                $Message = $res['content']['ErrorMessage'];
            } elseif ($res['content']['Message']) {
                $Message = $res['content']['Message'];
            }
            if (isset($res['content']['Code'])) {
                $ErrorCode = $res['content']['Code'];
            }
        } elseif (isset($res['headers']) && isset($res['headers']['http_code'])) {
            $ErrorCode = $response['headers']['http_code'];
        }

        throw new SmoneyException($Message, $ErrorCode);
    }
}
