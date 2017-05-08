<?php
include ('conn.php');
$sql = "CREATE TABLE ManangerRequire(
	requireId INT NOT NULL AUTO_INCREMENT,
	userId varchar(10) NOT NULL,
    sectionId varchar(10) NOT NULL,
	requireReason varchar(50) NOT NULL,
	requireDate varchar(50) NOT NULL,
	confirmDate varchar(50) DEFAULT '待定',
	requireState varchar(10) DEFAULT 'waiting',
    PRIMARY KEY (requireId)
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
