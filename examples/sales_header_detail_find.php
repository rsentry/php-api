<?php
require_once('../lib/RSentry.php');
$api = new RSentry('testkey');
$sales_id = '811b1648-39dd-49e8-965a-ffd4c040e806';
//if you just pass an id, will request a lookup by id
$salesDetail = $api->getSalesDetail($sales_id,'61ab8678-7a46-4938-8ff6-9fecef11e898');
if($salesDetail === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "Detail Found:" . $salesDetail->sales_item_name . "\n";
}
//if want to search by plu
$salesDetail = $api->getSalesDetailByPlu($sales_id,'12345');
if($salesDetail === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "Detail Found:" . $salesDetail->sales_item_name . "\n";
}
//if you pass an array, will do a search
$salesDetail = $api->getSalesDetail($sales_id,array(
	'plu_num'=>'1234',
	'sort'=>'sales_item_name',
	'limit'=> '5')
);
if($salesDetail === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	foreach($salesDetail->salesdetails as $detail)
	{
		echo $detail->sales_item_name . "\n";
	}
}
?>


