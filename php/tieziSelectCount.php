<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);
//$tiezimaxnum = $_POST[tieziMaxNum];
session_start();
$sessionId = $_SESSION['sessionid'];
$sql = "select count(tieziId) as AllNum from tiezi where tieziSection = '$sessionId'";
$result = mysql_query($sql);//执行SQL
if(!$result){
    die('wrong' . mysql_error());
}else{
    $b  = mysql_fetch_assoc( $result );
    echo $b['AllNum'];
}

mysql_close($con);
?>