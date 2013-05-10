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

	require 'db-functions.php';

   $Addresses=GetAddresses($FromNumber);

   $AddressCount=count($Addresses);
   echo "<Response>";

   if($AddressCount==1) {
   	$urlAddress=urlencode($Addresses[0]);
   	echo "<Gather action='Found-Handle-Individual-Address.php?AccountType=$AccountType&amp;Address=$urlAddress' numDigits='1'>";
      echo "<Say>Is the location where service is interrupted at $Addresses[0]?</Say>";
   
      echo "<Say>Please press 1 for Yes or 2 for No</Say>";
      echo '</Gather>';
   	
   } else {
   
   
      echo "<Say>Please select the location of the outage from the following list</Say>";
   	echo "<Gather action='Found-Handle-Multi-Address-Select.php' numDigits='1'>";
      for($i=0;$i<$AddressCount;$i++)
        {
   	    $KeyPress=$i+1;
          echo "<Say>Press $KeyPress for $Addresses[$i]</Say>";
   
        }
   
      echo "<Say>Press 0 for a location not listed</Say>";
	   echo '</Gather>';


   }  
   echo "</Response>";

?>

