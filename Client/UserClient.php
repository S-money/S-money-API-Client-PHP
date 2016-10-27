<?php
namespace Client;

use Client\AbstractClient;
use Facade\UserFacade;


class UserClient extends AbstractClient
{
	public function getUser($id)
	{
		$res = $this->httpClient
				->request('GET', $this->baseUrl.'/users/'.$id, ['headers'=>$this->headers])
				->getBody()
				->getContents();

		return $this->serializer->deserialize($res, 'Facade\UserFacade', 'json');
	}
}