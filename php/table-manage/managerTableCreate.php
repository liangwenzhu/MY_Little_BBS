<?php
include ('conn.php');
$sql = "CREATE TABLE Mananger(
	requireId INT NOT NULL AUTO_INCREMENT,
	userName varchar(50) NOT NULL,
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
