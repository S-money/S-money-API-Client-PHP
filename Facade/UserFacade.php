<?php

namespace Facade;

use JMS\Serializer\Annotation\Type;

class UserFacade
{
	/**
	 * @Type("integer")
	 */
	private $id;

	/**
	* @Type("Facade\UserProfileFacade")
	*/
	private $UserProfile;
}