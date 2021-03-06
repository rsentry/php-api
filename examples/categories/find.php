<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
try
{
	//if you just pass an id, will request a lookup by id
	$cat = $api->getCategories('250');
	echo "Category found: " . $cat->name . " \n";
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}

try
{
	//if you pass an array, will do a search
	$cats = $api->getCategories(array(
		'name'=>'food',
		'limit'=> '5')
	);
	foreach($cats->categories as $cat)
	{
		echo $cat->name . "\n";
	}
}
catch (RSentryException $e)
{
	echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
}
?>

