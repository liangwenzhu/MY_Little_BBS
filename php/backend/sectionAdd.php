<?php
include ('conn.php');

$title = $_POST[title];
$introduce = $_POST[introduce];

$sql = "insert Section
        (sectionName,sectionIntroduce,sectionCreatedDate) 
		values
		('$title','$introduce',now())";

if(!mysql_query($sql,$con)){
    die('error: ' . mysql_error());
}else{
	echo "success";
}


    mysql_close($con);
?>