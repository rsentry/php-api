<?php
require_once('../lib/RSentry.php');
$api = new RSentry('testkey');
$sales_id = '811b1648-39dd-49e8-965a-ffd4c040e806';
//you just pass a sales_header_id 
//and true/false (defaults to false if you don't pass anything) for if you want super categories as well
$salesDetail = $api->getSalesDetailByCategory($sales_id,true); 
if($salesDetail === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	foreach($salesDetail->categories as $cat)
	{
		echo $cat->name . ':' . $cat->sales . "\n";
	}
	foreach($salesDetail->super_categories as $super)
	{
		echo $super->name . ':' . $super->sales . "\n";
	}
}
?>
