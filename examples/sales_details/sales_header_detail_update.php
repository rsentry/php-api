<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
$sales_id = '780dea11-ea9d-454f-8027-5d4f413e0833';
try
{
	$values = array('quantity'=>'9');
	//using id
	$salesDetail = $api->updateSalesDetail($sales_id,'83e06af6-72a6-4812-b8c1-91f82effed01', $values);
	echo "Sales detail new quantity is:" . $salesDetail->quantity . "\n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

try
{
	//using plu
	$values = array('quantity'=>'11');
	$salesDetail = $api->updateSalesDetail($sales_id,'1234', $values, true);
	echo "Sales detail new quantity is:" . $salesDetail->quantity . "\n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

?>

