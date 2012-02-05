<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
try
{
	$prepItemsCosts = $api->getPrepItemsCosts('5af926d8-3c28-4509-881b-6fdf8e542ef7');
	echo $prepItemsCosts->prepitemcost->cost . "\n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>
