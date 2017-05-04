<?php
include ('conn.php');
$sql = "CREATE TABLE ExpertManager(
	requireId INT NOT NULL AUTO_INCREMENT,
	userId varchar(50) NOT NULL,
	relName varchar(50) NOT NULL,
	major varchar(50) NOT NULL,
	company varchar(50) NOT NULL,
	job varchar(50) NOT NULL,
	email varchar(50) NOT NULL,
    advantage varchar(250) NOT NULL,
	requireDate varchar(50) NOT NULL,
    PRIMARY KEY (requireId)
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
