<html>
<body>
<?php
include ('conn.php');
$sql = "CREATE TABLE Jubao(
    jubaoId INT NOT NULL AUTO_INCREMENT,
    jubaoType varchar(50) NOT NULL,
    tieziId varchar(15) NOT NULL,
    gentieId varchar(15) ,
	jubaoUserName varchar(50) NOT NULL,
    beijubaoUserName varchar(50) NOT NULL,
	jubaoReason varchar(50) DEFAULT 'yellow',
    jubaoDate varchar(50) NOT NULL,
    PRIMARY KEY (jubaoId)
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
<body>
</html>