<?php
include ('conn.php');

$tieziId = $_POST[tieziId];
//$sql = "SELECT * from Tiezi
//        WHERE tieziId = '$tieziId'";
$sql = "select a.*,b.userSign,b.userHead from 
(select * from Tiezi)a
inner join
(select * from Users)b
 on a.tieziCreater = b.userName
WHERE a.tieziId = '$tieziId'";
$result = mysql_query($sql);
$results = array();
$row = mysql_fetch_assoc($result);
$str = json_encode($row);
echo preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $str);

    mysql_close($con);
?>