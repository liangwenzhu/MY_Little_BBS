<?php
include ('conn.php');

$gentieId = $_POST[gentieId];
//$sql = "SELECT * from Tiezi
//        WHERE tieziId = '$tieziId'";
$sql = "select * from Users
WHERE userName = '$userName'";
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