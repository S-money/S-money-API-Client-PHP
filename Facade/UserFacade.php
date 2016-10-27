<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use Smoney\Smoney\Facade\UserProfileFacade;

/**
 * Class UserProfileFacade
 */
class UserFacade
{
    /**
     * @var integer $Id
     * @Type("integer")
     */
    private $Id;
    

    /**
    * @var UserProfileFacade $Profile
    * @Type("UserProfileFacade")
    */
    private $Profile;
}
