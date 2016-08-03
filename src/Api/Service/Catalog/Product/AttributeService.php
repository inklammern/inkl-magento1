<?php

namespace Inkl\Magento1\Api\Service\Catalog\Product;

use Inkl\Magento1\Api\Client\ClientInterface;

class AttributeService
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


	public function getOptions($attributeCode)
	{
		return $this->client->call('catalog_product_attribute.options', [$attributeCode]);
	}

}
