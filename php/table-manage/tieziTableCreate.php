<html>
<body>
<?php
include ('conn.php');
//tieziSection 是外键，对应Section表的Id
$sql = "CREATE TABLE Tiezi(
    tieziId INT NOT NULL AUTO_INCREMENT,
    tieziTitle varchar(120) NOT NULL,
    tieziContent varchar(1000) NOT NULL,
    tieziTag varchar(50) DEFAULT 'none',
    tieziSection varchar(50) NOT NULL,
    tieziScore varchar(50) DEFAULT '0',
    tieziCreater varchar(50) DEFAULT '提问人',
	tieziCreaterUserId varchar(50) NOT NULL,
    tieziCreaterData varchar(50) NOT NULL,
    tieziAnswer varchar(500) DEFAULT '0',
    tieziLastAnswer varchar(50) DEFAULT '最后更新ID',
    tieziLastAnswerDate varchar(50) DEFAULT '最后更新时间',
    tieziOverhead tinyint DEFAULT '0',
    PRIMARY KEY (tieziId )
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
echo "1 table added";
mysql_close($con);
?>
<body>
</html>