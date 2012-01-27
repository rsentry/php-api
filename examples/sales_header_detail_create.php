<?php
require_once('../lib/RSentry.php');
$api = new RSentry('testkey');
$salesDetail = $api->createSalesDetail('811b1648-39dd-49e8-965a-ffd4c040e806',array(
	'plu_num' => 1234,
	'quantity' => '6',
	'price' => '5.99')
);
     
if($salesDetail === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "The new sales detail id is: " . $salesDetail->id . "\n";
}
?>
