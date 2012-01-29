<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
$itemsCosts = $api->getItemsCosts('6f826e5a-b7e1-4f77-9e12-1dd9845c363b',array(
	'limit'=> '1')
);
if($itemsCosts === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	foreach($itemsCosts->itemscosts as $cost)
	{
		echo 'Cost:' . $cost->cost . "\n";
	}
}
?>
