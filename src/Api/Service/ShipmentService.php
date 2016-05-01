<?php

namespace Inkl\Magento1\Api\Service;

use Inkl\Magento1\Api\Client\ClientInterface;

class ShipmentService
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


	public function create($orderIncrementId, $trackingNumber = null, $sendMail = false, $comment = 'Automatic created via API.')
	{

		$shipmentId = $this->client->call('sales_order_shipment.create', [$orderIncrementId, null, $comment, false, false]);

		if ($trackingNumber)
		{
			$trackingId = $this->client->call('sales_order_shipment.addTrack', [$shipmentId, 'dhlint', 'DHL', $trackingNumber]);
		}

		if ($sendMail)
		{
			$this->client->call('sales_order_shipment.sendInfo', [$shipmentId]);
		}

		return $shipmentId;
	}

}
