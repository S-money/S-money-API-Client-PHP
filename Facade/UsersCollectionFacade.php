<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use Smoney\Smoney\Facade\UserFacade;

/**
 * Class UsersCollectionFacade
 */
class UsersCollectionFacade
{
    /**
     * @var array
     * @type 
     */
    public $users = array();

    /**
     * @param UserFacade $user
     */
    public function addUser(UserFacade $user)
    {
        $this->users[] = $user;
    }
}
