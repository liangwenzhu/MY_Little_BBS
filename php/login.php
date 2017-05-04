<?php
include ('conn.php');
//mysql_select_db("my_db", $con);
$username = $_POST[userName];
$password = $_POST[passWord];
$page="../idnex.php";
$sql = "select * from Users where userName ='$username'and passWord = '$password'";
$check = mysql_query($sql);
if($result = mysql_fetch_array($check)){
	$userid = $result['userId'];
    session_start();
    $_SESSION['username'] = $username;
	$_SESSION['userid'] = $userid;
    echo "success";
}else{
    echo "error";
}
/*
if($result = mysql_fetch_array($check)){
    session_start();
    $_SESSION['username'] = $username;
    echo "success";
}else{
    echo "error";
}
*/
?>
