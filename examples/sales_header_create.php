<?php
require_once('../lib/RSentry.php');
$api = new RSentry('testkey');
//only fields required are sales_date, location is based off of api key
$salesHeader = $api->createSalesSheet(array(
    "sales_date" => '01-01-2012') //date must be in form of mm-dd-YYYY
);
     
if($salesHeader === false)
{
	foreach($api->errors() as $error)
	{
		echo $error . "\n";
	}
}
else
{
	echo "The new sales sheet id is: " . $salesHeader->id . "\n";
}
?>
