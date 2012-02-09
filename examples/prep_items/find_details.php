<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
$prep_item_id = '5af926d8-3c28-4509-881b-6fdf8e542ef7';
try
{
	//if you just pass an id, will request a lookup by id
	$prepitemdetail = $api->getPrepItemsDetails($prep_item_id,'515b8605-4cb8-4d6d-ba88-7a04fc51f530');
	echo "Prep Item Detail found with quantity of: " . $prepitemdetail->quantity . " \n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

try
{
	$prepitemdetails = $api->getPrepItemsDetails($prep_item_id);
	foreach($prepitemdetails->prepitemsdetails as $prepitemdetail)
	{
		echo $prepitemdetail->quantity . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>

