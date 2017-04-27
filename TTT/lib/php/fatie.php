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

//$tieziTime = date("y-m-d",time());
//now()
$scoreInsert = "UPDATE Users 
set userScore = '$userScore'
where userName = '$TieziCreater'";
mysql_query($scoreInsert,$con);

$sql = "insert into Tiezi(tieziTitle,tieziContent,tieziTag,tieziSection,tieziScore,tieziCreater,tieziCreaterData) 
                    values ('$tieziTitle','$tieziContent','$tieziTag','$tieziSection','$tieziScore','$TieziCreater',now())";
if(!mysql_query($sql,$con)){
    die('error: ' . mysql_error());
}else{
    echo "success";
}

//$sql = "insert into Users(userName,passWord) values ('$username','$password')";
    mysql_close($con);
?>