<?php
include ('conn.php');
$jubaoType = $_POST[jubaoType];
$tieziId = $_POST[tieziId];
$gentieId = $_POST[gentieId];
$beijubaoUserName = $_POST[beijubaoUserName];
$jubaoReason = $_POST[jubaoReason];
session_start();
$userName = $_SESSION['username'];
$select = "select gentieId from Jubao where gentieId ='$gentieId'";
$selectResult = mysql_query($select,$con);
$selectResultRow = mysql_num_rows($selectResult);
if($selectResultRow > 0){
    echo"jubao exit";
    exit;
}else{
    $sql = "insert into Jubao(jubaoType,tieziId,gentieId,jubaoUserName,beijubaoUserName,jubaoReason,jubaoDate) values ('$jubaoType','$tieziId','$gentieId','$userName','$beijubaoUserName','$jubaoReason',now())";
    if(!mysql_query($sql,$con)){
        die('error: ' . mysql_error());
    }else{
        echo "success";
    }
}

//$sql = "insert into Users(userName,passWord) values ('$username','$password')";
    mysql_close($con);
?>