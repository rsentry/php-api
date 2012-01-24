<?php
require_once('../lib/RSentry.php');
$api = new RSentry('testkey');
$values = array('status'=>'closed');
$salesHeader = $api->updateSalesSheet('0862aa28-306d-4f38-85ae-245966349443', $values);
if($salesHeader === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "Sales sheet updated!\n";
}

?>
