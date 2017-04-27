<?php
include ('conn.php');
$tieziId = $_POST[tieziId];
session_start();
$username = $_SESSION['username'];

/*删除某帖子里的通知*/
$sql = "DELETE FROM Tongzhi
        WHERE userName = '$username'";

if(!mysql_query($sql,$con)){
    die('error: ' . mysql_error());
}else{
    echo "success";
}
    mysql_close($con);
?>