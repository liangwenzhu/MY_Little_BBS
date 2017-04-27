<html>
<body>
<?php
include ('conn.php');
$sql = "CREATE TABLE Users(
    userId INT NOT NULL AUTO_INCREMENT,
    userName varchar(15) NOT NULL,
    passWord varchar(15) NOT NULL,
    userSign varchar(50) DEFAULT '编辑自我介绍，让更多人了解你',
    userHead varchar(50) DEFAULT '0b0d4af3618929039e388b843782ab96',
    userScore varchar(15) DEFAULT '200',
    PRIMARY KEY (userId)
)";
if(!mysql_query($sql,$con)){
    die('error ' . mysql_error());
}
    echo "1 table added";

mysql_close($con);

?>
<body>
</html>