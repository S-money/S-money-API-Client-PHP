<?php

namespace Smoney\Smoney\Client;

use Smoney\Smoney\Client\AbstractClient;
use Smoney\Smoney\Facade\UserFacade;

/**
 * Class UserClient
 */
class UserClient extends AbstractClient
{
    /**
     * @param integer $id
     */
    public function getUser($id)
    {
        $res = $this->httpClient
                ->request('GET', $this->baseUrl.'/users/'.$id, ['headers'=>$this->headers])
                ->getBody()
                ->getContents();

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\UserFacade', 'json');
    }
}
