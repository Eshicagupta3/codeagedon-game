<?php
$date = new \DateTime();
echo date_format($date, 'Y-m-d H:i:s');



$date = date_default_timezone_set('Asia/Kolkata');

//If you want Day,Date with time AM/PM
echo "<br>".$today = date("Y-m-d, H:i:s");
?>