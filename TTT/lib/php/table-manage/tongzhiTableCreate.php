<html>
<body>
<?php
include ('conn.php');
$sql = "CREATE TABLE Tongzhi(
    tongzhiId INT NOT NULL AUTO_INCREMENT,
     tieziId varchar(15) NOT NULL,
    gentieId varchar(15) NOT NULL,
    userName varchar(50) NOT NULL,
    tieziTitle varchar(120) NOT NULL,
    tieziAnswer varchar(500) DEFAULT '1',
    tieziLastAnswer varchar(50) DEFAULT '最后更新ID',
    tieziLastAnswerDate varchar(50) DEFAULT '最后更新时间',
    PRIMARY KEY (tongzhiId)
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
<body>
</html>