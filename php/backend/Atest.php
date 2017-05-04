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
$sql = "insert into Expert(requireId,userId,relName,major,company,job,email,advantage,requireDate,comfirmDate)
	values ('$requireId','$userid','$relName','$major','$company','$job','$email','$advantage','$requireDate',now())";
echo $sql;
	?>