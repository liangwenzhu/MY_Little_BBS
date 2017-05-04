<?php
include ('conn.php');

$userId = $_POST[userId];
$expertId = $_POST[expertId];
$questionRequireId = $_POST[questionRequireId];
$questionTitle = $_POST[questionTitle];
$questionShowTime = $_POST[questionShowTime];
$questionIntroduce = $_POST[questionIntroduce];
$questionDetailIntroduce = $_POST[questionDetailIntroduce];
$advantage = $_POST[advantage];
$questionRequireStatus = $_POST[questionRequireStatus];

$expertUpdateSql = "UPDATE Expert
        SET advantage = '$advantage'
        WHERE expertId = '$expertId'";

if(!mysql_query($expertUpdateSql,$con)){
    die('error: ' . mysql_error());
}
$ExpertQuestionRequireUpdateSql = "UPDATE ExpertQuestionRequire
        SET questionTitle = '$questionTitle',
			questionShowTime = '$questionShowTime',
			questionIntroduce = '$questionIntroduce',
			questionDetailIntroduce = '$questionDetailIntroduce',
			questionEditTime = now()
        WHERE questionRequireId = '$questionRequireId'";

if(!mysql_query($ExpertQuestionRequireUpdateSql,$con)){
    die('error: ' . mysql_error());
}else{
	echo 'success';
}

    mysql_close($con);
?>