<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

	// if the caller pressed anything but 1 or 2 send them back
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

	
	require 'generic-functions.php';
   $FromNumber=GetPhoneNumber($FromNumber);  
	$PronouncableNumber=PronouncableNumber($FromNumber);
   $NumberFound=TRUE;

	require 'db-functions.php';

   $Addresses=GetAddresses($FromNumber,$AccountType);

   $AddressCount=count($Addresses);
   $NumberFound=($AddressCount>0);

?>
<Response>
  <?php 
	switch($UserPressed) {
	  case '1':	//Report Outage
		 if ($NumberFound) { 
		   echo "<Say>Looking for locations for phone number $PronouncableNumber</Say>";
		 	echo "<Redirect>Found-Address-Lookup.php?AccountType=$AccountType</Redirect>";
		} else {
		 	echo "<Redirect>Get-New-Phone-Number.php</Redirect>";
		}
	break;
  	case '2':  //Check Outage
		 if ($NumberFound) { 
		 	echo "<Redirect>Found-Check-Outage.php</Redirect>";
		} else {
		 	echo "<Redirect>Get-New-Phone-Number.php</Redirect>";
		}
  } //end switch
  ?>
</Response>