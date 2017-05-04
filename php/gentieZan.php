<?php

include ('conn.php');

$tieziId = $_POST[tieziId];
$gentieId = $_POST[gentieId];
$beidianzanUerName = $_POST[beidianzanUerName];


session_start();
$username = $_SESSION['username'];

/*用户点赞数更新*/	

$dianzanCountSql = "select * from Users WHERE userName = '$beidianzanUerName'";
$dianzanCountSqlResult = mysql_query($dianzanCountSql,$con);

$dianzanCountSqlRow = mysql_fetch_array($dianzanCountSqlResult);

$dianzanCount = $dianzanCountSqlRow['userUpVoteCount'];
$dianzanCount = $dianzanCount + 1;

$dianzanCountUpdateSql = "UPDATE Users 
set userUpVoteCount = '$dianzanCount'
where userName = '$beidianzanUerName'";
mysql_query($dianzanCountUpdateSql,$con);


/*该跟帖点赞数更新*/	

$gentieZanCountSql = "select * from Gentie WHERE gentieId = '$gentieId'";
$gentieZanCountSqlResult = mysql_query($gentieZanCountSql,$con);

$gentieZanCountSqlRow = mysql_fetch_array($gentieZanCountSqlResult);

$gentieZanCount = $gentieZanCountSqlRow['dianzanCount'];
$gentieZanCount = $gentieZanCount + 1;

$gentieZanCountUpdateSql = "UPDATE Gentie 
set dianzanCount = '$gentieZanCount'
where gentieId = '$gentieId'";
mysql_query($gentieZanCountUpdateSql,$con);



//积分更新，针对被点赞用户
$scoreSql = "select userScore from Users
where userName = '$beidianzanUerName'";
$scoreSqlResult = mysql_query($scoreSql);
while($scoreSqlResultRow = mysql_fetch_array($scoreSqlResult)){
    $scoreSqlNew =  $scoreSqlResultRow['userScore']+5;
}


//新的积分插入
$scoreInsert = "UPDATE Users 
set userScore = '$scoreSqlNew'
where userName = '$beidianzanUerName'";
mysql_query($scoreInsert,$con);

/**/

//插入新数据到点赞表里
$sql = "insert into Dianzan(tieziId,gentieId,userName,beidianzanUserName,dianzaiDate) 
values 
('$tieziId','$gentieId','$userName','$beidianzanUserName',now())";

if(!mysql_query($sql,$con)){
    die('error: ' . mysql_error());
}else{
    echo "success";
}
    mysql_close($con);
?>