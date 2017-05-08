<?php
include ('conn.php');
//$username = $_POST[userName];
$requireReason = $_POST[requireReason];
session_start();	
$userId = $_SESSION['userid'];

$sectionId = $_SESSION['sessionid'];

$select = "select userId from ManangerRequire where userId ='$userId'";
$selectResult = mysql_query($select,$con);
$selectResultRow = mysql_num_rows($selectResult);
if($selectResultRow > 0){
    echo"username exit";
    exit;
}

$sql = "insert into ManangerRequire(userId,sectionId,requireReason,requireDate) 
		values ('$userId','$sectionId','$requireReason',now())";
    if(!mysql_query($sql,$con)){
        die('error: ' . mysql_error());
    }else{
        echo "success";
    }   

	
    mysql_close($con);
?>
