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
     * @param array  $files with key as filename and value as file content
     */
    public function create($appUserId, $files)
    {
        $uri = 'users/'.$appUserId.'/kyc';

        $multiparts = [];
        
        $i = 1;
        foreach ($files as $key => $value) {
            $multiparts[] = [
                'name' => 'file-'.$i,
                'contents' => $value,
                'filename' => $key
            ];
            $i ++;
        }
        
        $res = $this->action('POST', $uri, ['multipart' => $multiparts], ['Content-Type'=>null]);

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
    public function get($appUserId, $kycId)
    {
        $uri = 'users/'.$appUserId.'/kyc/'.$kycId;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\KycFacade', 'json');
    }
}
