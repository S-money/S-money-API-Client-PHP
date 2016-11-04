<?php

namespace Smoney\Smoney\Client;

use Smoney\Smoney\Client\AbstractClient;
use Smoney\Smoney\Facade\SubAccountFacade;

/**
 * Class SubAccountClient
 */
class SubAccountClient extends AbstractClient
{
    /**
     * @param string $appUserId
     * @param int    $appAccountId
     */
    public function get($appUserId, $appAccountId)
    {
        $uri = 'users/'.$appUserId.'/subaccounts/'.$appAccountId;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\SubAccountFacade', 'json');
    }

    /**
     * @param string $appUserId
     */
    public function index($appUserId)
    {
        $uri = 'users/'.$appUserId.'/subaccounts';
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'ArrayCollection<Smoney\Smoney\Facade\SubAccountFacade>', 'json');
    }

    /**
     * @param string           $appUserId
     * @param SubAccountFacade $subAccount
     */
    public function create($appUserId, SubAccountFacade $subAccount)
    {
        $uri = 'users/'.$appUserId.'/subaccounts';
        $body = $this->serializer->serialize($subAccount, 'json');

        return $this->action('POST', $uri, ['body'=>$body]);
    }

    /**
     * @param string           $appUserId
     * @param SubAccountFacade $subAccount
     */
    public function update($appUserId, SubAccountFacade $subAccount)
    {
        $uri = 'users/'.$appUserId.'/subaccounts/'.$subAccount->appAccountId;
        $body = $this->serializer->serialize($subAccount, 'json');

        return $this->action('PUT', $uri, ['body'=>$body]);
    }

    /**
     * @param string           $appUserId
     * @param SubAccountFacade $subAccount
     */
    public function delete($appUserId, SubAccountFacade $subAccount)
    {
        $uri = 'users/'.$appUserId.'/subaccounts/'.$subAccount->appAccountId;
        $body = $this->serializer->serialize($subAccount, 'json');

        return $this->action('DELETE', $uri, ['body'=>$body]);
    }
}
