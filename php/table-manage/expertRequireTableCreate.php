<?php
include ('conn.php');
/*专家申请表*/
$sql = "CREATE TABLE ExpertRequire(
	requireId INT NOT NULL AUTO_INCREMENT,
	userId varchar(50) NOT NULL,
	relName varchar(50) NOT NULL,
	major varchar(50) NOT NULL,
	company varchar(50) NOT NULL,
	job varchar(50) NOT NULL,
	email varchar(50) NOT NULL,
    advantage varchar(250) NOT NULL,
	requireDate varchar(50) NOT NULL,
	comfirmDate varchar(50) DEFAULT '待定',
	requireState varchar(10) DEFAULT 'waiting',
    PRIMARY KEY (requireId)
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
