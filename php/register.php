<?php
include ('conn.php');
$username = $_POST[userName];
$password = $_POST[passWord];
$select = "select userName from Users where userName ='$username'";
$selectResult = mysql_query($select,$con);
$selectResultRow = mysql_num_rows($selectResult);
if($selectResultRow > 0){
    echo"username exit";
    exit;
}else{
    $sql = "insert into Users(userName,passWord,userCreatedData) values ('$username','$password',now())";
    if(!mysql_query($sql,$con)){
        die('error: ' . mysql_error());
    }else{
        echo "success";
    }
}

//$sql = "insert into Users(userName,passWord) values ('$username','$password')";
    mysql_close($con);
?>