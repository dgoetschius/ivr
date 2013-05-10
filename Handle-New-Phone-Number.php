<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";


	if(isset($_REQUEST['Digits'])) {
		$NewNumber=$_REQUEST['Digits'];
	} else {
   	$NewNumber='8505563068';
   }
	


	require 'db-functions.php';

   $Addresses=GetAddresses($NewNumber);

   $AddressCount=count($Addresses);
   echo "<Response>";

   if($AddressCount==1) {
   	echo '<Gather action="Found-Handle-Individule-Address.php" numDigits="1">';
      echo "<Say>Is the location where service is interrupted at $Addresses[0]?</Say>";
   
      echo "<Say>Please press 1 for Yes or 2 for No</Say>";
      echo '</Gather>';
   	
   } else {
   
   
      echo "<Say>Please select the location of the outage from the following list</Say>";
   	echo '<Gather action="Found-Handle-Multi-Address-Select.php" numDigits="1">';
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

