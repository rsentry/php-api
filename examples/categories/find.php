<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
//if you just pass an id, will request a lookup by id
$cat = $api->getCategories('250');
if($cat === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "Category found: " . $cat->name . " \n";
}
//if you pass an array, will do a search
$cats = $api->getCategories(array(
	'name'=>'food',
	'limit'=> '5')
);
if($cats === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	foreach($cats->categories as $cat)
	{
		echo $cat->name . "\n";
	}
}
?>

