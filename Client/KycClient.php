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
     * @param array  $files with $value is the whole binary file and $key the name that will be sent as filename
     */
    public function create($appUserId, $files)
    {
        $uri = 'users/'.$appUserId.'/kyc';

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

        $res = $this->action('POST', $uri, null, $multiparts);

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
