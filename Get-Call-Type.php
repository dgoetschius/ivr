<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

	if(isset($_REQUEST['From'])) {
   	$FromNumber=$_REQUEST['From'];
   } else {
	   $FromNumber='8506274651';
	}

	if(isset($_GET['Digits'])) {
   	$UserPressed=$_REQUEST['Digits'];
   } else {
	   $UserPressed=1;
	}

   if($UserPressed==2) {
   	$AccountType='Water';
   } else {
   	$AccountType='Electric';
   }

   echo "<Response>";
   echo	"<Say>Thank you.</Say>";
   echo "<Gather numDigits='1' action='Handle-Call-Type.php?AccountType=$AccountType' method='POST'>";
   echo "<Say>To report an outage, press 1, To check the status of a previously reported outage, press 2. </Say>";
   echo "</Gather>";
   echo "</Response>";

?>
