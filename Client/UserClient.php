<?php

namespace Smoney\Smoney\Client;

use Smoney\Smoney\Client\AbstractClient;
use Smoney\Smoney\Facade\UserFacade;
use Smoney\Smoney\Facade\UsersCollectionFacade;

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
        $uri = 'users/'.$id;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\UserFacade', 'json');
    }

    public function getUsers()
    {
        $uri = 'users';
        $res = $this->action('GET', $uri);

        $usersCollectionFacade = new UsersCollectionFacade();
        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\UsersCollectionFacade', 'json');
    }

    public function searchUsers($smoney_user_id, $firstName, $lastName, $email)
    {
        $res = $this->action($httpVerbe, $uri);
    }
}
