<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
//if you just pass an id, will request a lookup by id
try
{
	$prepitem = $api->getPrepItems('5af926d8-3c28-4509-881b-6fdf8e542ef7');
	echo "Prep Item found: " . $prepitem->name . " \n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

try
{
	//if you pass an array, will do a search
	$prepitems = $api->getPrepItems(array(
		'status'=>'active',
		'sort'=>'name-|status',
		'limit'=> '5')
	);
	foreach($prepitems->prepitems as $prepitem)
	{
		echo $prepitem->name . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>

