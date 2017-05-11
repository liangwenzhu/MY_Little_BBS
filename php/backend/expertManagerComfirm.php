<?php
include ('conn.php');
/*专家审核通过，将专家加入专家表*/
$requireId = $_POST[requireId];
$userId = $_POST[userId];
$requireState = 'confirmed';

$IfExpertselect = "select userId from Expert where userId ='$userId'";
$IfExpertselectResult = mysql_query($IfExpertselect,$con);
$IfExpertselectResulttRow = mysql_num_rows($IfExpertselectResult);
if($IfExpertselectResulttRow > 0){
    echo"username exit";
    exit;
}

$expertRequireUpdateSql = "update	ExpertRequire 
						set comfirmDate = now(),
							requireState = '$requireState'
						where requireId = '$requireId'";
if(!mysql_query($expertRequireUpdateSql,$con)){
    die('error: ' . mysql_error());
}

$sql = "insert into Expert(requireId,userId)
values ('$requireId','$userId')";
if(!mysql_query($sql,$con)){
	die('error: ' . mysql_error());
}else{
	echo "success";
}
   

    mysql_close($con);
?>