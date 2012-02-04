<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
try
{
	$values = array('status'=>'closed');
	$salesHeader = $api->updateSalesSheet('811b1648-39dd-49e8-965a-ffd4c040e806', $values);
	echo "Sales sheet updated!\n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

?>
