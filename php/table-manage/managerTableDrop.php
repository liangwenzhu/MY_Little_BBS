<?php
include ('conn.php');
$sql = "DROP TABLE Mananger";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
echo "删除表成功";
mysql_close($con);
?>