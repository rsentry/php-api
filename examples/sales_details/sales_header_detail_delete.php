<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
$sales_id = 'f17253ed-7a51-434d-a6ff-1f31ded10a92';
try
{
	//using id
	$salesDetail = $api->deleteSalesDetail($sales_id,'5be1935f-9804-4ecb-a6ed-b85109777cdd');
	echo "Sales detail delete successful!\n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

try
{
	//using plu
	$salesDetail = $api->deleteSalesDetail($sales_id,'12345', true);
	echo "Sales detail delete successful!\n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

?>


