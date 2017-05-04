<?php
include ('conn.php');
//$username = $_POST[userName];
$title = $_POST[title];
$introduce = $_POST[introduce];

session_start();
    //$a=$_POST['userName'];
    //$_SESSION['username'] = $a;
	
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$expertId = '';
$select = "select userId from ExpertQuestionRequire where userId ='$userid'";
$selectResult = mysql_query($select,$con);
$selectResultRow = mysql_num_rows($selectResult);
if($selectResultRow > 0){
    echo"require exit";
    exit;
}
$ifExpertSql = "select * from Expert where userId = '$userid'";
$ifExpertSqlResult = mysql_query($ifExpertSql,$con);
$ifExpertSqlResultRow = mysql_num_rows($ifExpertSqlResult);
if($ifExpertSqlResultRow < 1){
    echo"not expert";
    exit;
}else{
	$resultRow = mysql_fetch_array($ifExpertSqlResult);
	$expertId = $resultRow[expertId];
}

//$expertId = $ifExpertSqlResultRow["expertId"];
$sql = "insert into ExpertQuestionRequire(expertId,userId,questionTitle,questionIntroduce,questionRequireTime)
	values ('$expertId','$userid','$title','$introduce',now())";
    if(!mysql_query($sql,$con)){
        die('error: ' . mysql_error());
    }else{
        echo "success";
    }  


//$sql = "insert into Users(userName,passWord) values ('$username','$password')";
    mysql_close($con);
?>