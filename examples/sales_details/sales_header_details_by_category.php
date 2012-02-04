<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
$sales_id = '780dea11-ea9d-454f-8027-5d4f413e0833';
try
{
	//you just pass a sales_header_id 
	//add true/false (defaults to false if you don't pass anything) for if you want super categories as well
	$salesDetail = $api->getSalesDetailByCategory($sales_id,true); 
	foreach($salesDetail->categories as $cat)
	{
		echo $cat->name . ':' . $cat->sales . "\n";
	}
	foreach($salesDetail->super_categories as $super)
	{
		echo $super->name . ':' . $super->sales . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>
