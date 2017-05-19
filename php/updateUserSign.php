<?php
include ('conn.php');
session_start();
$usersign = $_POST[usersign];
$userid = $_SESSION['userid'];
$sql = "UPDATE Users
        SET userSign = '$usersign'
        WHERE userId = '$userid'";

if(!mysql_query($sql,$con)){
    die('error: ' . mysql_error());
}else{
    echo "success";
}
    mysql_close($con);
?>