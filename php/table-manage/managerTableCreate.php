<?php
include ('conn.php');
/*版主表，区别于版主申请表*/
$sql = "CREATE TABLE Mananger(
	managerId INT NOT NULL AUTO_INCREMENT,
	userId varchar(10) NOT NULL,
    requireId varchar(10) NOT NULL,
	sectionId varchar(10) NOT NULL,
    PRIMARY KEY (managerId)
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
