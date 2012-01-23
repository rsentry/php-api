<?php
require_once('../lib/RSentry.php');
$api = new RSentry('testkey');
//if you just pass an id, will request a lookup by id
$salesHeader = $api->getSalesSheet('0862aa28-306d-4f38-85ae-245966349443');
if($salesHeader === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "Sales sheet found!\n";
}
//if you pass an array, will do a search
$salesHeader = $api->getSalesSheet(array(
	'status'=>'open',
	'sort'=>'sales_date-|status',
	'limit'=> '5')
);
if($salesHeader === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	foreach($salesHeader->sales as $sale)
	{
		echo $sale->docnum . "\n";
	}
}
?>

