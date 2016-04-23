<?php

namespace Magento\Api\Client;

use Zend\Http;
use Zend\XmlRpc\Client;

class XmlRpcClient implements ClientInterface
{

	private $server;
	private $username;
	private $password;

	private $client;
	private $session;


	/**
	 * SoapClient constructor.
	 * @param $server
	 * @param $username
	 * @param $password
	 */
	public function __construct($server, $username, $password)
	{
		$this->server = $server;
		$this->username = $username;
		$this->password = $password;
	}


	private function getClient()
	{
		if (!$this->client)
		{
			$this->client = new Client($this->server, new Http\Client(null, ['sslverifypeer' => false]));
		}

		return $this->client;
	}


	private function getSession()
	{
		if (!$this->session)
		{
			$this->session = $this->getClient()->call('login', [$this->username, $this->password]);
		}

		return $this->session;
	}


	public function call($method, $params = [])
	{
		return $this->getClient()->call('call', [$this->getSession(), $method, $params]);
	}

}
