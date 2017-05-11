<?php
include ('conn.php');
session_start();
/*功能：创建帖子，获取帖子ID，同时将其他外键ID存入专家问答确认表中。*/
/*以下是专家问答确认表需要的*/
$expertId = $_POST[expertId];
$userId = $_POST[userId];
$questionRequireId = $_POST[questionRequireId];
//更改问题申请表的状态。
$questionRequireStatus = $_POST[questionRequireStatus];
/*以下是帖子表需要的*/
$tieziTitle = $_POST[tieziTitle];
$tieziContent = $_POST[tieziContent];
$tieziCreater = $_POST[tieziCreater];
$tieziCreaterUserId = $_POST[tieziCreaterUserId];
$tieziSection = $_POST[tieziSection];

//查看确认表中是否已存在，已存在则返回。
$checkIfExitSql = "select questionRequireId from expertQuestion where questionRequireId = '$questionRequireId'";
$checkIfExitResult = mysql_query($checkIfExitSql,$con);
$checkIfExitResultRow = mysql_num_rows($checkIfExitResult);
if($checkIfExitResultRow > 0)
{
	echo "exit";
	exit;
}
//创建新的帖子
$fatieSql = "insert into Tiezi(tieziTitle,tieziContent,tieziSection,tieziCreater,tieziCreaterUserId,tieziCreaterData) 
                    values ('$tieziTitle','$tieziContent','$tieziSection','$tieziCreater','$tieziCreaterUserId',now())";
if(!mysql_query($fatieSql,$con)){
    die('error: ' . mysql_error());
}
//更改问答申请表状态
$ExpertQuestionRequireStatusSql = "update ExpertQuestionRequire set questionRequireStatus = '$questionRequireStatus'
									where questionRequireId = '$questionRequireId'";
if(!mysql_query($ExpertQuestionRequireStatusSql,$con)){
    die('error: ' . mysql_error());
}

$tieziIdSelectSql = "select tieziId from Tiezi where tieziCreaterUserId = '$tieziCreaterUserId' 
order by tieziId desc
limit 0,1";

$tieziIdSelectSqlResult = mysql_query($tieziIdSelectSql,$con);
$tieziIdSelectSqlRow = mysql_fetch_array($tieziIdSelectSqlResult);
$tieziId = $tieziIdSelectSqlRow['tieziId'];

$expertQuestionInsertSql = "insert into expertQuestion(expertId,userId,questionRequireId,tieziId,expertQuestionConfirmDate)
							values ('$expertId','$userId','$questionRequireId','$tieziId',now())";
if(!mysql_query($expertQuestionInsertSql,$con)){
    die('error: ' . mysql_error());
}else{
	echo "success";
}
    mysql_close($con);
?>