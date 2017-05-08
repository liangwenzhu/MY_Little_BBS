<?php
include ('conn.php');
$sql = "CREATE TABLE Section(
	sectionId INT NOT NULL AUTO_INCREMENT,
	sectionName varchar(10) NOT NULL,
	sectionIntroduce varchar(100) NOT NULL,
	sectionCreatedDate varchar(100) NOT NULL,
    PRIMARY KEY (sectionId)
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
