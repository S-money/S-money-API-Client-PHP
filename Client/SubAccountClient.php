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
     *
     * @return SubAccountFacade
     */
    public function get($appUserId, $appAccountId)
    {
        $uri = 'users/'.$appUserId.'/subaccounts/'.$appAccountId;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\SubAccountFacade', 'json');
    }

    /**
     * @param string $appUserId
     *
     * @return ArrayCollection
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
     *
     * @return SubAccountFacade
     */
    public function create($appUserId, SubAccountFacade $subAccount)
    {
        $uri = 'users/'.$appUserId.'/subaccounts';
        $body = $this->serializer->serialize($subAccount, 'json');
        $res = $this->action('POST', $uri, ['body'=>$body]);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\SubAccountFacade', 'json');
    }

    /**
     * @param string           $appUserId
     * @param SubAccountFacade $subAccount
     *
     * @return SubAccountFacade
     */
    public function update($appUserId, SubAccountFacade $subAccount)
    {
        $uri = 'users/'.$appUserId.'/subaccounts/'.$subAccount->appAccountId;
        $body = $this->serializer->serialize($subAccount, 'json');
        $res = $this->action('PUT', $uri, ['body'=>$body]);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\SubAccountFacade', 'json');
    }

    /**
     * @param string  $appUserId
     * @param integer $subAccountId
     *
     * @return string
     */
    public function delete($appUserId, $subAccountId)
    {
        $uri = 'users/'.$appUserId.'/subaccounts/'.$subAccountId;

        return $this->action('DELETE', $uri);
    }
}
