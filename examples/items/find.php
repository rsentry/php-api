<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
//if you just pass an id, will request a lookup by id
$item = $api->getItems('0bf0d265-f083-487a-948e-863580f3f94c');
if($item === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "Item found: " . $item->name . " \n";
}
//if you pass an array, will do a search
$items = $api->getItems(array(
	'status'=>'active',
	'sort'=>'name-|status',
	'limit'=> '5')
);
if($items === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	foreach($items->items as $item)
	{
		echo $item->name . "\n";
	}
}
?>

