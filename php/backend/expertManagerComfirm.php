<?php
include ('conn.php');
/*专家审核通过，将专家加入专家表*/
$requireId = $_POST[requireId];
$relName = $_POST[relName];
$major = $_POST[major];
$company = $_POST[company];
$job = $_POST[job];
$email = $_POST[email];
$advantage = $_POST[advantage];
$requireDate = $_POST[requireDate];
$userId = $_POST[userId];

$select = "select userId from Expert where userId ='$userId'";
$selectResult = mysql_query($select,$con);
$selectResultRow = mysql_num_rows($selectResult);
if($selectResultRow > 0){
    echo"username exit";
    exit;
}else{
    $sql = "insert into Expert(requireId,userId,relName,major,company,job,email,advantage,requireDate,comfirmDate)
	values ('$requireId','$userId','$relName','$major','$company','$job','$email','$advantage','$requireDate',now())";
    if(!mysql_query($sql,$con)){
        die('error: ' . mysql_error());
    }else{
        echo "success";
    }
}

    mysql_close($con);
?>