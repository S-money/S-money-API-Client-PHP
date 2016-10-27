<?php

namespace Smoney\Smoney\Facade;

use JMS\Serializer\Annotation\Type;

/**
 * Class UserProfileFacade
 */
class UserProfileFacade
{
    /**
     * @Type("string")
     */
    private $firstname;

    /**
    * @Type("DateTime")
    */
    private $birthdate;
}
