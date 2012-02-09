<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
$sales_item_id ='5f3602b7-707f-40e2-b4c3-1dd7a13ed4f1';
try
{
	//if you just pass an id, will request a lookup by id
	$salesitemdetail = $api->getSalesItemsDetails($sales_item_id,'40dcfffb-f9c6-40e8-b0ea-db4fa979777f');
	echo "Prep Item Detail found with quantity of: " . $salesitemdetail->quantity . " \n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

try
{
	$salesitemdetails = $api->getSalesItemsDetails($sales_item_id);
	foreach($salesitemdetails->salesitemsdetails as $salesitemdetail)
	{
		echo $salesitemdetail->quantity . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>


