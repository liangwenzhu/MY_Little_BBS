<?php
include ('conn.php');
//$username = $_POST[userName];
$relName = $_POST[relName];
$major = $_POST[major];
$company = $_POST[company];
$job = $_POST[job];
$email = $_POST[email];
$advantage = $_POST[advantage];
session_start();
    //$a=$_POST['userName'];
    //$_SESSION['username'] = $a;
	
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];

$select = "select userId from ExpertManager where userId ='$userid'";
$selectResult = mysql_query($select,$con);
$selectResultRow = mysql_num_rows($selectResult);
if($selectResultRow > 0){
    echo"username exit";
    exit;
}else{
    $sql = "insert into ExpertManager(userId,relName,major,company,job,email,advantage,requireDate)
	values ('$userid','$relName','$major','$company','$job','$email','$advantage',now())";
    if(!mysql_query($sql,$con)){
        die('error: ' . mysql_error());
    }else{
        echo "success";
    }
}

//$sql = "insert into Users(userName,passWord) values ('$username','$password')";
    mysql_close($con);
?>