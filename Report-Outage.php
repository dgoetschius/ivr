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
   	$AccountType=$_GET['AccountType'];
   } else {
	   $AccountType='Electric';
	}

	if(isset($_GET['Address'])) {
   	$Address=$_REQUEST['Address'];
   } else {
	   $Address='Unknown';
	}
	
	$OutageReported=FALSE;

	require 'db-functions.php';
	
	$OutageReported=AddressHasActiveIncident($Address);
	



echo "<Response>";
if($OutageReported) {
	echo "<Say>We are aware of your outage and will assign a crew as soon as possible</Say>";
	} else {
	echo "<Say>Report $AccountType Outage at $Address </Say>";	
	} 
		
		
echo "</Response>";

?>
