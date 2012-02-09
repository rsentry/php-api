<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
//if you just pass an id, will request a lookup by id
try
{
	$salesitem = $api->getSalesItems('5f3602b7-707f-40e2-b4c3-1dd7a13ed4f1');
	echo "Sales Item found: " . $salesitem->name . " \n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
try
{
	//if you pass an array, will do a search
	$salesitems = $api->getSalesItems(array(
		'status'=>'active',
		'sort'=>'name-',
		'limit'=> '5')
	);
	foreach($salesitems->salesitems as $salesitem)
	{
		echo $salesitem->name . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>


