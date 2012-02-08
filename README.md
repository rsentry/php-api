##Installation

First download the latest version:

	git clone https://github.com/rsentry/php-api

The add this line to your script:
	
	require_once("/path/to/php-api/lib/RSentry.php");

A simple example:

	<?php
	require_once('../lib/RSentry.php');
	$api = new RSentry('your api key');
	//if you just pass an id, will request a lookup by id
	try
	{
		$item = $api->getItems('{ITEMS_ID}');
		echo "Item found: " . $item->name . " \n";
	}
	catch (RSentryException $e)
	{
		echo "Exception: {$e->getMessage()} code: {$e->getCode()}\n";
	}
	?>

##Documentation

For more information and the most up-to-date documentation, visit [developer.restaurantsentry.com](http://developer.restaurantsentry.com) .
