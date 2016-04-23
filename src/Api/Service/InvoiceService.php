<?php

namespace Magento\Api\Service;

use Magento\Api\Client\ClientInterface;

class InvoiceService
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


	public function create($orderIncrementId, $comment = 'Automatic created via API.')
	{
		$invoiceId = $this->client->call('sales_order_invoice.create', [$orderIncrementId, null, $comment, false, false]);

		$this->client->call('sales_order_invoice.capture', [$invoiceId]);

		return $invoiceId;
	}

}
