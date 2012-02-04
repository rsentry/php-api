<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
try
{
	//if you just pass an id, will request a lookup by id
	$supercat = $api->getSuperCategories('53');
	echo "Super Category found: " . $supercat->name . " \n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

try
{
	//if you pass an array, will do a search
	$supercats = $api->getSuperCategories(array(
		'name'=>'food',
		'limit'=> '5')
	);
	foreach($supercats->super_categories as $supercat)
	{
		echo $supercat->name . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>
