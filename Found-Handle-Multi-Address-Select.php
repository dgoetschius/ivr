<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	//$FromNumber=$_REQUEST['From'];
	//$UserPressed= (int) $_REQUEST['Digits'];
	
	$UserPressed=2;
	$AddressIndex=$UserPresed+1;
	$FromNumber='8506274651';
 	//echo "<Say>Checking $PronouncableNumber</Say>";

	require 'db-functions.php';

   $Addresses=GetAddresses($FromNumber);

   $AddressCount=count($Addresses);


echo "<Response>";
if($UserPressed>0 and $UserPreessed<=$AddressCount) {
	echo "<Redirect>Report-Outage.php?Address=$Addresses[$UserPressed]</Redirect>";
	} else {
	echo "<Redirect>handle-new-phone-number.php";	
	}
echo "</Response>";

?>
