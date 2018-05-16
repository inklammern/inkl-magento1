<?php

namespace Inkl\Magento1\Api\Service\Catalog;

use Inkl\Magento1\Api\Client\ClientInterface;

class ProductService
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

	public function getList($filters, $storeId = 0)
	{
		return $this->client->call('catalog_product.list', [$filters, $storeId]);
	}

	public function getInfo($productId, $storeId = 0)
	{
		return $this->client->call('catalog_product.info', [$productId, $storeId]);
	}

}
