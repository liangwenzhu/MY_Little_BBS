<?php
include ('conn.php');
$sql = "CREATE TABLE Dianzan(
	dianzanId INT NOT NULL AUTO_INCREMENT,
	tieziId varchar(50) NOT NULL,
    gentieId varchar(50) NOT NULL,
    userName varchar(50) NOT NULL,
	beidianzanUserName varchar(50) NOT NULL,
	dianzaiDate varchar(50) NOT NULL,
    PRIMARY KEY (dianzanId)
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
