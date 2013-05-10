<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

	if(isset($_REQUEST['Digits'])) {
		$UserPressed=$_REQUEST['Digits'];
	} else {
   	$UserPressed='1';
   }
		
	if(isset($_REQUEST['From'])) {
		$FromNumber=$_REQUEST['From'];
	} else {
	   $FromNumber='6277654';
	}

	if(isset($_GET['AccountType'])) {
   	$AccountType=$_REQUEST['AccountType'];
   } else {
	   $AccountType='Electric';
	}

	require 'db-functions.php';

   $Addresses=GetAddresses($FromNumber,$AccountType);

   $AddressCount=count($Addresses);


echo "<Response>";
if($UserPressed==1) {
 	$urlAddress=urlencode($Addresses[0]);
	echo "<Redirect>Report-Outage.php?AccountType=$AccountType&amp;Address=$urlAddress</Redirect>";
	} else {
	echo "<Redirect>Get-New-Phone-Number.php?AccountType=$AccountType</Redirect>";	
	}
echo "</Response>";

?>
