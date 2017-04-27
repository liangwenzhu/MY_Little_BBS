<?php
include ('conn.php');
$gentieId = $_POST[gentieId];
/*删除跟帖*/
$GentieDeletesql = "DELETE FROM Gentie 
        WHERE gentieId = '$gentieId'";
if(!mysql_query($GentieDeletesql,$con)){
    die('error: ' . mysql_error());
}else{
    echo "success";
}

    mysql_close($con);
?>