<?php

namespace Smoney\Smoney\Client;

use Smoney\Smoney\Client\AbstractClient;

/**
 * Class KycClient
 */
class KycClient extends AbstractClient
{
    /**
     * @param string $appUserId
     * @param array  $files
     */
    public function create($appUserId, $files)
    {
        $uri = 'users/'.$appUserId.'/kyc';

        $headers = [
            'Authorization' => $this->headers['Authorization'],
            'Accept' => $this->headers['Accept'],
        ];

        $multiparts = array();
        
        $i = 1;
        foreach ($files as $key => $value) {
            $multiparts[] = [
                'name' => 'file-'.$i,
                'contents' => $value,
                'filename' => $key
            ];
            $i ++;
        }
        $options = [
            'headers'=>$headers,
            'multipart' => $multiparts
        ];

        $res = $this->action('POST', $uri, null, $options);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\KycFacade', 'json');
    }

    /**
     * @param string $appUserId
     */
    public function index($appUserId)
    {
        $uri = 'users/'.$appUserId.'/kyc';
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'ArrayCollection<Smoney\Smoney\Facade\KycFacade>', 'json');
    }

    /**
     * @param string $appUserId
     */
    public function index($appUserId)
    {
        $uri = 'users/'.$appUserId.'/kyc'.$kycId;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'ArrayCollection<Smoney\Smoney\Facade\KycFacade>', 'json');
    }
}
