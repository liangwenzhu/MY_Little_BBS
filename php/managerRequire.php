<?php
include ('conn.php');
//$username = $_POST[userName];
$advantage = $_POST[advantage];
session_start();
    //$a=$_POST['userName'];
    //$_SESSION['username'] = $a;
	
$username = $_SESSION['username'];

$select = "select userName from Mananger where userName ='$username'";
$selectResult = mysql_query($select,$con);
$selectResultRow = mysql_num_rows($selectResult);
if($selectResultRow > 0){
    echo"username exit";
    exit;
}else{
    $sql = "insert into Mananger(userName,advantage,requireDate) values ('$username','$advantage',now())";
    if(!mysql_query($sql,$con)){
        die('error: ' . mysql_error());
    }else{
        echo "success";
    }
}

//$sql = "insert into Users(userName,passWord) values ('$username','$password')";
    mysql_close($con);
?>