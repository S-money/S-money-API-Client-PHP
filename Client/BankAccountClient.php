<?php

namespace Smoney\Smoney\Client;

use Smoney\Smoney\Client\AbstractClient;
use Smoney\Smoney\Facade\BankAccountFacade;

/**
 * Class SubAccountClient
 */
class BankAccountClient extends AbstractClient
{

    /**
     * @param string $appUserId
     * @param int    $bankAccountId
     */
    public function get($appUserId, $bankAccountId)
    {
        $uri = 'users/'.$appUserId.'/bankaccounts/'.$bankAccountId;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\BankAccountFacade', 'json');
    }

    /**
     * @param string $appUserId
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
     */
    public function create($appUserId, BankAccountFacade $bankAccount)
    {
        $uri = 'users/'.$appUserId.'/bankaccounts';
        $body = $this->serializer->serialize($bankAccount, 'json');

        return $this->action('POST', $uri, $body);
    }

    /**
     * @param string            $appUserId
     * @param BankAccountFacade $bankAccount
     */
    public function update($appUserId, BankAccountFacade $bankAccount)
    {
        $uri = 'users/'.$appUserId.'/bankaccounts';
        $body = $this->serializer->serialize($bankAccount, 'json');

        return $this->action('PUT', $uri, $body);
    }

    /**
     * @param string            $appUserId
     * @param BankAccountFacade $bankAccount
     */
    public function delete($appUserId, BankAccountFacade $bankAccount)
    {
        $uri = 'users/'.$appUserId.'/bankaccounts/'.$bankAccount->id;
        $body = $this->serializer->serialize($bankAccount, 'json');

        return $this->action('DELETE', $uri, $body);
    }
}
