<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
$sales_id = '780dea11-ea9d-454f-8027-5d4f413e0833';
try
{
	//if you just pass an id, will request a lookup by id
	$salesDetail = $api->getSalesDetail($sales_id,'83e06af6-72a6-4812-b8c1-91f82effed01');
	echo "Detail Found:" . $salesDetail->sales_item_name . "\n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

try
{
	//if want to search by plu
	$salesDetail = $api->getSalesDetailByPlu($sales_id,'1234');
	echo "Detail Found:" . $salesDetail->sales_item_name . "\n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

try
{
	//if you pass an array, will do a search
	$salesDetail = $api->getSalesDetail($sales_id,array(
		'plu_num'=>'1234',
		'sort'=>'sales_item_name',
		'limit'=> '5')
	);
	foreach($salesDetail->salesdetails as $detail)
	{
		echo $detail->sales_item_name . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>


