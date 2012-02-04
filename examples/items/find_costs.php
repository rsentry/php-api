<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
try
{
	$itemsCosts = $api->getItemsCosts('6f826e5a-b7e1-4f77-9e12-1dd9845c363b',array(
		'limit'=> '1')
	);
	foreach($itemsCosts->itemscosts as $cost)
	{
		echo 'Cost:' . $cost->cost . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>
