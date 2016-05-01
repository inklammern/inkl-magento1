<?php

namespace Inkl\Magento1\Api\Client;

interface ClientInterface {

	public function call($method, $params = []);

}
