<?php
include ('conn.php');
/*版主审核通过，将版主加入版主表*/

$userId = $_POST[userId];
$requireId = $_POST[requireId];
$sectionId = $_POST[sectionId];
$requireState = $_POST[requireState];

$select = "select userId from Mananger where userId ='$userId'";
$selectResult = mysql_query($select,$con);
$selectResultRow = mysql_num_rows($selectResult);
if($selectResultRow > 0){
    echo"exit";
    exit;
}

$managerRequireConfirmDateUpdateSql = "update ManangerRequire 
										set requireState = '$requireState',confirmDate = now() 	
										where requireId = '$requireId'";
    if(!mysql_query($managerRequireConfirmDateUpdateSql,$con)){
        die('error: ' . mysql_error());
    }

$sql = "insert into Mananger(userId,requireId,sectionId)
	values ('$userId','$requireId','$sectionId')";
    if(!mysql_query($sql,$con)){
        die('error: ' . mysql_error());
    }else{
        echo "success";
    }


    mysql_close($con);
?>