<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
try
{
	//only need id
	$success = $api->deleteSalesSheet('811b1648-39dd-49e8-965a-ffd4c040e806');
	echo "The sales sheet is deleted.\n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>

