<?php

namespace Magento\Api\Client;

interface ClientInterface {

	public function call($method, $params = []);

}
