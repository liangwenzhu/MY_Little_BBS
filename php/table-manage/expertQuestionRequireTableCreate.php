<?php
/*专家表，区别于专家申请表*/
include ('conn.php');
$sql = "CREATE TABLE ExpertQuestionRequire(
	questionRequireId INT NOT NULL AUTO_INCREMENT,
	expertId varchar(50) NOT NULL,
	userId varchar(50) NOT NULL,
	questionTitle varchar(50) NOT NULL,
	questionIntroduce varchar(500) NOT NULL,
	questionDetailIntroduce varchar(500) DEFAULT '待定',
	questionRequireTime varchar(50) NOT NULL,
	questionShowTime varchar(50) DEFAULT '待定',
	questionEditTime varchar(50) DEFAULT '待定',
	questionRequireStatus varchar(10) DEFAULT 'waiting',
    PRIMARY KEY (questionRequireId)
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
