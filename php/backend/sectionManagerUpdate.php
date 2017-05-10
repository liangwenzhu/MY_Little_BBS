<?php
include ('conn.php');

$sectionId = $_POST[sectionId];
$sectionName = $_POST[sectionName];
$sectionIntroduce = $_POST[sectionIntroduce];

$sectionUpdateSql = "UPDATE Section
        SET sectionName = '$sectionName',
			sectionIntroduce = '$sectionIntroduce',
			sectionEditordDate = now()
        WHERE sectionId = '$sectionId'";

if(!mysql_query($sectionUpdateSql,$con)){
    die('error: ' . mysql_error());
}else{
	echo 'success';
}

    mysql_close($con);
?>