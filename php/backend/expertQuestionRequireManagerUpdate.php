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

//取到申请表ID
$requireSelectSql = "select requireId from Expert where expertId = '$expertId'";
$requireSelectSqlResult = mysql_query($requireSelectSql,$con);
$requireSelectSqlRow = mysql_fetch_array($requireSelectSqlResult);
$requireId = $requireSelectSqlRow["requireId"];

//在更改表中更改字段
$expertUpdateSql = "UPDATE ExpertRequire
        SET advantage = '$advantage'
        WHERE requireId = '$requireId'";

if(!mysql_query($expertUpdateSql,$con)){
    die('error: ' . mysql_error());
}
$ExpertQuestionRequireUpdateSql = "UPDATE ExpertQuestionRequire
        SET questionTitle = '$questionTitle',
			questionShowTime = '$questionShowTime',
			questionIntroduce = '$questionIntroduce',
			questionDetailIntroduce = '$questionDetailIntroduce',
			questionEditTime = now(),
			questionRequireStatus = '$questionRequireStatus'
        WHERE questionRequireId = '$questionRequireId'";

if(!mysql_query($ExpertQuestionRequireUpdateSql,$con)){
    die('error: ' . mysql_error());
}else{
	echo 'success';
}

    mysql_close($con);
?>