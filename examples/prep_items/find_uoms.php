<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
$prep_item_id = '5af926d8-3c28-4509-881b-6fdf8e542ef7';
try
{
	//if you just pass an id, will request a lookup by id
	$prepitemuom = $api->getPrepItemsUoms($prep_item_id,'839ed28d-8052-4d52-b036-f47d8f447a55');
	echo "Prep Item UOM found: " . $prepitemuom->name . " \n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
try
{
	//will return all uoms
	$prepitemsuoms = $api->getPrepItemsUoms($prep_item_id);
	foreach($prepitemsuoms->prepitemsuoms as $uom)
	{
		echo $uom->name . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>

