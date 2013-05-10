<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	if(isset($_REQUEST['From'])) {
	$FromNumber=$_REQUEST['From'];
   } else {
	$FromNumber='8506274651';
	}
 	//echo "<Say>Checking $PronouncableNumber</Say>";

?>
<Response>
	<Say>Thank you for calling Talquin Electric Cooperative.</Say>
	<Gather numDigits='1' action='Get-Call-Type.php?' method='POST'>
        <Say>Please press 1 for electric or 2 for water. </Say>
    </Gather>
</Response>

