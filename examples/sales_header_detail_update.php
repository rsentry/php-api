<?php
require_once('../lib/RSentry.php');
$api = new RSentry('testkey');
$values = array('quantity'=>'9');
$sales_id = '811b1648-39dd-49e8-965a-ffd4c040e806';
//using id
$salesDetail = $api->updateSalesDetail($sales_id,'61ab8678-7a46-4938-8ff6-9fecef11e898', $values);
if($salesDetail === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "Sales detail new quantity is:" . $salesDetail->quantity . "\n";
}
//using plu
$values = array('quantity'=>'11');
$salesDetail = $api->updateSalesDetail($sales_id,'1234', $values, true);
if($salesDetail === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "Sales detail new quantity is:" . $salesDetail->quantity . "\n";
}

?>

