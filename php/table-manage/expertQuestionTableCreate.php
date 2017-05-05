<html>
<body>
<?php
include ('conn.php');
//专家问答确认表，区别于申请表
//PRIMARY KEY (TieziId );
$sql = "CREATE TABLE expertQuestion(
    expertQuestionId INT NOT NULL AUTO_INCREMENT,
    expertId varchar(20) NOT NULL,
    userId varchar(20) NOT NULL,
    questionRequireId varchar(20) NOT NULL,
    tieziId varchar(20) NOT NULL,
	expertQuestionConfirmDate varchar(20) NOT NULL,
    PRIMARY KEY (expertQuestionId )
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
echo "1 table added";
mysql_close($con);
?>
<body>
</html>