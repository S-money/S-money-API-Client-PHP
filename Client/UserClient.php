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
     * @param int $appUserId
     */
    public function get($appUserId)
    {
        $uri = 'users/'.$appUserId;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'Smoney\Smoney\Facade\UserFacade', 'json');
    }

    public function index()
    {
        $uri = 'users';
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'ArrayCollection<Smoney\Smoney\Facade\UserFacade>', 'json');
    }

    /**
     * @param string $smoney_user_id
     * @param string $firstName
     * @param string $lastName
     * @param string email
     */
    public function search($smoney_user_id = null, $firstName = null, $lastName = null, $email = null)
    {
        $uri = 'users/search?firstname='.$firstName.'&lastname='.$lastName.'&email='.$email;
        $res = $this->action('GET', $uri);

        return $this->serializer->deserialize($res, 'ArrayCollection<Smoney\Smoney\Facade\UserFacade>', 'json');
    }

    /**
     * @param UserFacade $user
     */
    public function create(UserFacade $user)
    {
        $uri = 'users';
        $body = $this->serializer->serialize($user, 'json');
        
        return $this->action('POST', $uri, ['body'=>$body]);
    }

    /**
     * @param UserFacade $user
     */
    public function update(UserFacade $user)
    {
        $uri = 'users/'.$user->appUserId;
        $body = $this->serializer->serialize($user, 'json');

        return $this->action('PUT', $uri, ['body'=>$body]);
    }

    /**
     * @param UserFacade $user
     */
    public function close(UserFacade $user)
    {
        $user->status = 5;

        return $this->updateUser($user);
    }
}
