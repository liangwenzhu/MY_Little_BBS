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
$tieziSection = $_POST[tieziSection];
/*
$expertUpdateSql = "UPDATE Expert
        SET advantage = '$advantage'
        WHERE expertId = '$expertId'";
*/
$requireSelectSql = "select requireId from Expert where expertId = '$expertId'";
$requireSelectSqlResult = mysql_query($requireSelectSql,$con);
$requireSelectSqlRow = mysql_fetch_array($requireSelectSqlResult);
$requireId = $requireSelectSqlRow["requireId"];

$expertUpdateSql = "UPDATE ExpertRequire
        SET advantage = '$advantage'
        WHERE requireId = '$requireId'";
		
if(!mysql_query($expertUpdateSql,$con)){
    die('error: ' . mysql_error());
}
/*查出专家问答表中的帖子Id。对帖子的内容也进行修改*/
$tieziIdSelectSql = "select tieziId from expertQuestion where questionRequireId = '$questionRequireId'";

$tieziIdSelectSqlResult = mysql_query($tieziIdSelectSql,$con);
$tieziIdSelectSqlRow = mysql_fetch_array($tieziIdSelectSqlResult);
$tieziId = $tieziIdSelectSqlRow['tieziId'];
/*帖子内容进行更改*/
$tieziContentUpdateSql = "UPDATE Tiezi
        SET tieziTitle = '$questionTitle',
			tieziContent = '$questionIntroduce',
			tieziSection = '$tieziSection',
			tieziCreaterData = now()
        WHERE tieziId = '$tieziId'";

if(!mysql_query($tieziContentUpdateSql,$con)){
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