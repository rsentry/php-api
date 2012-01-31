<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
//if you just pass an id, will request a lookup by id
$supercat = $api->getSuperCategories('53');
if($supercat === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "Super Category found: " . $supercat->name . " \n";
}
//if you pass an array, will do a search
$supercats = $api->getSuperCategories(array(
	'name'=>'food',
	'limit'=> '5')
);
if($supercats === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	foreach($supercats->categories as $supercat)
	{
		echo $supercat->name . "\n";
	}
}
?>


