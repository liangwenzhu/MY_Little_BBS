<?php
include ('conn.php');
session_start();

$tieziTitle = $_POST[tieziTitle];
$tieziContent = $_POST[tieziContent];
$tieziTag = $_POST[tieziTag];
$tieziSection = $_POST[tieziSection];
$tieziScore = $_POST[tieziScore];
$userScore = $_POST[userScore];
$TieziCreater = $_SESSION['username'];
$TieziCreaterUserId = $_SESSION['userid'];
//$tieziTime = date("y-m-d",time());
//now()


/*用户发帖数更新*/	
$fatieCountSql = "select * from Users WHERE userName = '$TieziCreater'";
$fatieCountSqlResult = mysql_query($fatieCountSql,$con);

$fatieCountSqlRow = mysql_fetch_array($fatieCountSqlResult);

$fatieCount = $fatieCountSqlRow['userFatieCount'];
$fatieCount = $fatieCount + 1;

$userFatieCountUpdateSql = "UPDATE Users 
set userFatieCount = '$fatieCount'
where userName = '$TieziCreater'";
mysql_query($userFatieCountUpdateSql,$con);

/*用户积分更新*/
$scoreInsert = "UPDATE Users 
set userScore = '$userScore'
where userName = '$TieziCreater'";
mysql_query($scoreInsert,$con);

$sql = "insert into Tiezi(tieziTitle,tieziContent,tieziTag,tieziSection,tieziScore,tieziCreater,tieziCreaterUserId,tieziCreaterData) 
                    values ('$tieziTitle','$tieziContent','$tieziTag','$tieziSection','$tieziScore','$TieziCreater','$TieziCreaterUserId',now())";
if(!mysql_query($sql,$con)){
    die('error: ' . mysql_error());
}else{
    echo "success";
}

//$sql = "insert into Users(userName,passWord) values ('$username','$password')";
    mysql_close($con);
?>