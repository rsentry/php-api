<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
$itemsUOMs = $api->getItemsUOMs('6f826e5a-b7e1-4f77-9e12-1dd9845c363b',array(
	'limit'=> '1')
);
if($itemsUOMs === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	foreach($itemsUOMs->itemsuoms as $uom)
	{
		echo 'Name:' . $uom->name . "\n";
	}
}
?>
