<?php
include ('conn.php');
session_start();
$username = $_SESSION['username'];
$sql = "SELECT * from Users
        WHERE userName = '$username'";

$result = mysql_query($sql);
$results = array();
/*while ($row = mysql_fetch_assoc($result)) {
    $results[] = $row;
}*/
$row = mysql_fetch_assoc($result);
$str = json_encode($row);
echo preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $str);
//echo preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2LE', 'UTF-8', pack('H4', '\\1'))", $str);

/*
while($row = mysql_fetch_array($result)){
    echo json_encode($row);
    //echo $row['userSign'] . $username;
}*/
    mysql_close($con);
?>