<?php

namespace Facade;

use JMS\Serializer\Annotation\Type;

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