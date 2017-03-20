<?php
include ('conn.php');
$tieziId = $_GET[tieziId];
$sql = "UPDATE Tiezi
        SET tieziOverhead = 1
        WHERE tieziId = '$tieziId'";

if(!mysql_query($sql,$con)){
    die('error: ' . mysql_error());
}else{
    echo "success";
}
    mysql_close($con);
?>