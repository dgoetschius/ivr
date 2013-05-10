<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";


echo "<Response>";
	echo '<Gather numDigits="10" action="Handle-Manual-Phone-Number" method="POST">';
   echo "<Say>Please enter the 10-digit phone number of the outage location styarting with the area code now.</Say>";
   echo "</Gather>";
echo "</Response>";

?>