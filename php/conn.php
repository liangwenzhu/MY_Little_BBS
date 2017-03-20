<?php
header("Content-type: text/html; charset=utf-8");
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);
?>
