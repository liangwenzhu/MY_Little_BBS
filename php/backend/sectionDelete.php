<?php
include ('conn.php');
$tieziId = $_POST[tieziId];

/*该帖子的跟帖也删除*/
$GentieDeletesql = "DELETE FROM Gentie 
        WHERE tieziId = '$tieziId'";
if(!mysql_query($GentieDeletesql,$con)){
    die('error: ' . mysql_error());
}

$sql = "DELETE FROM Tiezi
        WHERE tieziId = '$tieziId'";

if(!mysql_query($sql,$con)){
    die('error: ' . mysql_error());
}else{
    echo "success";
}
    mysql_close($con);
?>