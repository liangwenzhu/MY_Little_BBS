<?php
include ('conn.php');
$tieziId = $_POST[tieziId];
//$floorNum = $_POST[floorNum];
$beigentieFloorNum = $_POST[beigentieFloorNum];
$gentieContent = $_POST[gentieContent];

session_start();
$username = $_SESSION['username'];

/*积分更新*/
$scoreSql = "select userScore from Users
where userName = '$username'";
$scoreSqlResult = mysql_query($scoreSql);
while($scoreSqlResultRow = mysql_fetch_array($scoreSqlResult)){
    $scoreSqlNew =  $scoreSqlResultRow['userScore']+5;
}

/*新的积分插入*/
$scoreInsert = "UPDATE Users 
set userScore = '$scoreSqlNew'
where userName = '$username'";
mysql_query($scoreInsert,$con);

/*查询跟帖后的楼层*/
$floorCountSql = "select a.floorNum from
(select * from Gentie )a
left join
(select * from Tiezi )b
 on a.tieziId = b.tieziId
WHERE a.tieziId = '$tieziId'
order by a.gentieId desc
limit 0,1";
$floorCountSqlResult = mysql_query($floorCountSql);
//echo mysql_error();
$Row = mysql_num_rows($floorCountSqlResult);
if($Row < 1 ){
    $floorNum = 2;
}else{
    while($floorCountSqlResultRow = mysql_fetch_array($floorCountSqlResult)){
        $floorNum =  $floorCountSqlResultRow['floorNum']+1;
    }
}
/*将回答者更新到帖子表里*/
$tieziAnswerUpdateSql = "UPDATE Tiezi
        SET tieziAnswer = '$floorNum',tieziLastAnswer = '$username',tieziLastAnswerDate = now()
        WHERE tieziId = '$tieziId'";
if(!mysql_query($tieziAnswerUpdateSql,$con)){
    die('error: ' . mysql_error());
}

/*插入新数据到更贴表里*/
$sql = "insert into Gentie(userName,tieziId,floorNum,gentieContent,gentieCreaterData,beigentieFloorNum) values ('$username','$tieziId','$floorNum','$gentieContent',now(),'$beigentieFloorNum')";

if(!mysql_query($sql,$con)){
    die('error: ' . mysql_error());
}else{
    echo "success";
}
    mysql_close($con);
?>