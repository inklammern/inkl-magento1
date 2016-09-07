<?php

namespace Inkl\Magento1\Api\Service\Catalog;

use Inkl\Magento1\Api\Client\ClientInterface;

class CategoryService
{

	/** @var ClientInterface */
	private $client;

	/**
	 * OrderStatusImport constructor.
	 * @param ClientInterface $client
	 */
	public function __construct(ClientInterface $client)
	{
		$this->client = $client;
	}


	public function getTree($parentId, $storeId = 0)
	{
		return $this->client->call('catalog_category.tree', [$parentId, $storeId]);
	}

}
