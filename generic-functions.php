<?php

	function PronouncableNumber($number)
	{
	 $ReturnString='';	
    for($i=0;$i<strlen($number);$i++) 
    { 
       $ReturnString=$ReturnString . $number[$i] . ' ';
    }
    return $ReturnString;
   } 	 

	function GetPhoneNumber($number)
	{
   if(strlen($number)<10) {
	   	$ReturnString=$number;
	} else {	
      	$ReturnString=substr($number, strlen($number)-10, 10);	
      }
   return $ReturnString;
   } 	 


?>