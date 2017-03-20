<html>
<body>
<?php
include ('conn.php');
$sql = "CREATE TABLE UsersHead(
    userName varchar(15) NOT NULL,
    touc
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
<body>
</html>