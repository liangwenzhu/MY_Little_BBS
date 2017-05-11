<?php
/*专家表，区别于专家申请表*/
include ('conn.php');
$sql = "CREATE TABLE Expert(
	expertId INT NOT NULL AUTO_INCREMENT,
	requireId varchar(50) NOT NULL,
	userId varchar(50) NOT NULL,
	
    PRIMARY KEY (expertId)
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
