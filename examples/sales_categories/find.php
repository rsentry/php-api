<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
try
{
	//if you just pass an id, will request a lookup by id
	$cat = $api->getSalesCategories('198');
	echo "Sales Category found: " . $cat->name . " \n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

try
{
	//if you pass an array, will do a search
	$cats = $api->getSalesCategories(array(
		'name'=>'wine',
		'limit'=> '5')
	);
	foreach($cats->salescategories as $cat)
	{
		echo $cat->name . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>

