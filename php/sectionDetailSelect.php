<?php
include ('conn.php');
$sectionId = $_POST[sectionId];

$sql = "select * from Section where sectionId = '$sectionId'";
$result = mysql_query($sql);
$results = array();

$row = mysql_fetch_assoc($result);
$str = json_encode($row);
echo preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $str);

    mysql_close($con);
?>