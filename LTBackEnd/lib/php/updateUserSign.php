<?php
include ('conn.php');
session_start();
$usersign = $_GET[userSign];
$username = $_SESSION['username'];
$sql = "UPDATE Users
        SET userSign = '$usersign'
        WHERE userName = '$username'";

if(!mysql_query($sql,$con)){
    die('error: ' . mysql_error());
}else{
    echo "success";
}
    mysql_close($con);
?>