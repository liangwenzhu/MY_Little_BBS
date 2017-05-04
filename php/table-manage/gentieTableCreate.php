<html>
<body>
<?php
include ('conn.php');
$sql = "CREATE TABLE Gentie(
    gentieId INT NOT NULL AUTO_INCREMENT,
    userName varchar(50) NOT NULL,
    tieziId varchar(15) NOT NULL,
    floorNum varchar(15) NOT NULL,
    gentieContent varchar(1000) NOT NULL,
    gentieCreaterData varchar(50) NOT NULL,
    beigentieFloorNum varchar(15) DEFAULT '1',
	beigentieContent varchar(1000) NOT NULL,
	beigentieUserName varchar(50) NOT NULL,
	dianzanCount varchar(15) DEFAULT '0',
	caiCount varchar(15) DEFAULT '0',
    PRIMARY KEY (gentieId)
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
<body>
</html>