<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
try
{
	$salesDetail = $api->createSalesDetail('780dea11-ea9d-454f-8027-5d4f413e0833',array(
		'plu_num' => '1234',
		'quantity' => '6',
		'price' => '5.99')
	);
	echo "The new sales detail id is: " . $salesDetail->id . "\n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>
