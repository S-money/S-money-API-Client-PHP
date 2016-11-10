<?php

namespace Smoney\Smoney\Client;

use Smoney\Smoney\Client\AbstractClient;
use Smoney\Smoney\Facade\BankAccountFacade;

/**
 * Class BankAccountClient
 */
class BankAccountClient extends AbstractClient
{

    /**
     * @param string $appUserId
     * @param int    $bankAccountId
     *
     * @return BankAccountFacade
     */
    public function get($appUserId, $bankAccountId)
    {
        $uri = 'users/'.$appUserId.'/bankaccounts/'.$bankAccountId;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\BankAccountFacade', 'json');
    }

    /**
     * @param string $appUserId
     *
     * @return ArrayCollection
     */
    public function index($appUserId)
    {
        $uri = 'users/'.$appUserId.'/bankaccounts';
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'ArrayCollection<Smoney\Smoney\Facade\BankAccountFacade>', 'json');
    }

    /**
     * @param string            $appUserId
     * @param BankAccountFacade $bankAccount
     *
     * @return BankAccountFacade
     */
    public function create($appUserId, BankAccountFacade $bankAccount)
    {
        $uri = 'users/'.$appUserId.'/bankaccounts';
        $body = $this->serializer->serialize($bankAccount, 'json');
        $res = $this->action('POST', $uri, ['body'=>$body]);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\BankAccountFacade', 'json');
    }

    /**
     * @param string            $appUserId
     * @param BankAccountFacade $bankAccount
     *
     * @return BankAccountFacade
     */
    public function update($appUserId, BankAccountFacade $bankAccount)
    {
        $uri = 'users/'.$appUserId.'/bankaccounts';
        $body = $this->serializer->serialize($bankAccount, 'json');
        $res = $this->action('PUT', $uri, ['body'=>$body]);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\BankAccountFacade', 'json');
    }

    /**
     * @param string $appUserId
     * @param        $bankAccountId
     *
     */
    public function delete($appUserId, $bankAccountId)
    {
        $uri = 'users/'.$appUserId.'/bankaccounts/'.$bankAccountId;
        $this->action('DELETE', $uri);
    }
}
