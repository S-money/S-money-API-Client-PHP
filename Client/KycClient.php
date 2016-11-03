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

        $headers = array(
            'Authorization' => $this->headers['Authorization'],
            'Accept' => $this->headers['Accept'],
        );
        $multiparts = array();
        $i = 1;
        foreach ($files as $key => $value) {
            $multiparts[] = array(
                'name'=>'file-'.$i,
                'contents'=>$value,
                'filename'=>$key
            );

            $i ++;
        }

        print_r($multiparts);
        $res = $this->httpClient->request('POST', $this->baseUrl.'/'.$uri, [
            'headers'=>$headers,
            'multipart' => $multiparts
        ])
        ->getBody()
        ->getContents();

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\KycFacade', 'json');
    }

    /**
     * @param string $appUserId
     */
    public function get($appUserId)
    {
        $uri = 'users/'.$appUserId.'/kyc';
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'ArrayCollection<Smoney\Smoney\Facade\KycFacade>', 'json');
    }
}
