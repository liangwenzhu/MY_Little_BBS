<?php
include ('conn.php');
$tieziId = $_POST[tieziId];
//$floorNum = $_POST[floorNum];
//$beigentieFloorNum = $_POST[beigentieFloorNum];
//$gentieContent = $_POST[gentieContent];
$tieziCreater = $_POST[tieziCreater];
$tieziTitle = $_POST[tieziTitle];
session_start();
$username_session = $_SESSION['username'];

/*如果是楼主自己留言，就不要插入通知表里了*/
if($username_session==$tieziCreater){
    echo 'selfMessage';
    return;
}

/*先查出这个帖子里的最后一个ID，也就是最新的回复*/
$gentieIdSelectSql = "select a.gentieId,a.userName,a.gentieCreaterData from
(select * from Gentie)a
left join
(select * from Tiezi)b
 on a.tieziId = b.tieziId
WHERE a.tieziId = '$tieziId'
order by a.gentieId desc
limit 0,1";

$gentieIdSelectResult = mysql_query($gentieIdSelectSql);
while($gentieIdSelectResultRow = mysql_fetch_array($gentieIdSelectResult)){
    $gentieId =  $gentieIdSelectResultRow['gentieId'];
    $tieziLastAnswer = $gentieIdSelectResultRow['userName'];
    $tieziLastAnswerDate = $gentieIdSelectResultRow['gentieCreaterData'];
}


/*查询通知是否已存在*/
$tongzhiIsExitsSql = "select tieziId from Tongzhi
WHERE tieziId = '$tieziId'";
$tongzhiIsExitsSqlResult = mysql_query($tongzhiIsExitsSql);
//echo mysql_error();
$tongzhiIsExitsRow = mysql_num_rows($tongzhiIsExitsSqlResult);
if($tongzhiIsExitsRow < 1 ){
    /*插入新数据到通知表里*/
    $tongzhiInsertSql = "insert into Tongzhi(tieziId,gentieId,userName,tieziTitle,tieziLastAnswer,tieziLastAnswerDate)values('$tieziId','$gentieId','$tieziCreater','$tieziTitle','$tieziLastAnswer','$tieziLastAnswerDate')";

    if(!mysql_query($tongzhiInsertSql,$con)){
        die('error: ' . mysql_error());
    }else{
        echo "tongzhisuccess";
    }

}else{
    /*通知已存在*/
    while($tongzhiIsExitsSqlResultRow = mysql_fetch_array($tongzhiIsExitsSqlResult)){
        $tieziAnswerSelectSql = "select * from Tongzhi WHERE tieziId = '$tieziId'";
        $tieziAnswerSelectSqlResult = mysql_query($tieziAnswerSelectSql);
        while($tieziAnswerSelectSqlResultRow = mysql_fetch_array($tieziAnswerSelectSqlResult)){
            $tieziAnswerCount =  $tieziAnswerSelectSqlResultRow['tieziAnswer'];
            $tieziAnswerCount = $tieziAnswerCount + 1;
        }
        $tieziAnswerUpdateSql = "update Tongzhi set tieziAnswer = '$tieziAnswerCount'WHERE tieziId = '$tieziId'";
        if(!mysql_query($tieziAnswerUpdateSql,$con)){
            die('error: ' . mysql_error());
        }else{
            echo "tongzhisuccess";
        }
    }
}



    mysql_close($con);
?>