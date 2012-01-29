<?php
require_once('../../lib/RSentry.php');
$api = new RSentry('testkey');
$sales_id = '811b1648-39dd-49e8-965a-ffd4c040e806';
//using id
$salesDetail = $api->deleteSalesDetail($sales_id,'61ab8678-7a46-4938-8ff6-9fecef11e898');
if($salesDetail === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "Sales detail delete successful!\n";
}
//using plu
$salesDetail = $api->deleteSalesDetail($sales_id,'12345', true);
if($salesDetail === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "Sales detail delete successful!\n";
}

?>


