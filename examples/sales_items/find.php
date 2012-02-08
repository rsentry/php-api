<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
//if you just pass an id, will request a lookup by id
try
{
	$salesitem = $api->getSalesItems('5af926d8-3c28-4509-881b-6fdf8e542ef7');
	echo "Sales Item found: " . $salesitem->name . " \n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
try
{
	//if you pass an array, will do a search
	$salesitems = $api->getPrepItems(array(
		'status'=>'active',
		'sort'=>'name-|status',
		'limit'=> '5')
	);
	foreach($salesitems->prepitems as $salesitem)
	{
		echo $salesitem->name . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>


