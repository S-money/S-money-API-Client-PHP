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
    * @var UsersCollectionFacade $users
    * @Type("arrayCollection<Smoney\Smoney\Facade\UserFacade>")
    */
    public $users;
}
