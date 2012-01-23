<?php
require_once('../lib/RSentry.php');
$api = new RSentry('testkey');
//only need id
$success = $api->deleteSalesSheet('0862aa28-306d-4f38-85ae-245966349443');
     
if($success === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "The sales sheet is deleted.\n";
}
?>

