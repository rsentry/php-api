<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
try
{
	$itemsUOMs = $api->getItemsUOMs('6f826e5a-b7e1-4f77-9e12-1dd9845c363b',array(
		'limit'=> '1')
	);
	foreach($itemsUOMs->itemsuoms as $uom)
	{
		echo 'Name:' . $uom->name . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>
