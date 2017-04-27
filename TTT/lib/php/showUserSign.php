<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("my_db", $con);
session_start();
$username = $_SESSION['username'];
$sql = "SELECT userSign from Users
        WHERE userName = '$username'";
$result = mysql_query($sql);
echo mysql_error();
while($row = mysql_fetch_array($result)){
    echo $row['userSign'];
}
    mysql_close($con);
?>