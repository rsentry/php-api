<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
//if you just pass an id, will request a lookup by id
try
{
	$item = $api->getItems('0bf0d265-f083-487a-948e-863580f3f94c');
	echo "Item found: " . $item->name . " \n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

try
{
	//if you pass an array, will do a search
	$items = $api->getItems(array(
		'status'=>'active',
		'sort'=>'name-|status',
		'limit'=> '5')
	);
	foreach($items->items as $item)
	{
		echo $item->name . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>

