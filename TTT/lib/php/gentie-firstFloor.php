<?php
include ('conn.php');

$tieziId = $_POST[tieziId];
//$sql = "SELECT * from Tiezi
//        WHERE tieziId = '$tieziId'";
$sql = "select a.tieziId,a.tieziTitle,a.tieziContent,a.tieziScore,a.tieziCreater,a.tieziCreaterData,b.userName,b.userSign,b.userHead from 
(select * from Tiezi )a
left join
(select * from Users )b
 on a.tieziCreater = b.userName
WHERE a.tieziId = '$tieziId'";
$result = mysql_query($sql);
$results = array();
/*while ($row = mysql_fetch_assoc($result)) {
    $results[] = $row;
}*/
$row = mysql_fetch_assoc($result);
$str = json_encode($row);
echo preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $str);

    mysql_close($con);
?>