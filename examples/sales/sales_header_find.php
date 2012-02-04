<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
try
{
	//if you just pass an id, will request a lookup by id
	$salesHeader = $api->getSalesSheet('811b1648-39dd-49e8-965a-ffd4c040e806');
	echo "Doc Number {$salesHeader->docnum} found!\n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

try
{
	//if you pass an array, will do a search
	$salesHeader = $api->getSalesSheet(array(
		'status'=>'open',
		'sales_date' => '07-00-0000',
		'sort'=>'sales_date-|status',
		'limit'=> '5')
	);
	foreach($salesHeader->sales as $sale)
	{
		echo $sale->docnum . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>

