<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);

$sectionId = $_POST[sectionId];

$sql = "select c.userName from
		(select * from Mananger)a
		inner join
		(select * from Section)b
		inner join
		(select * from Users)c
		where a.sectionId = b.sectionId and a.userId = c.userId and a.sectionId='$sectionId'";
$result =mysql_query($sql);//执行SQL
$json ="";
$data =array(); //定义好一个数组.PHP中array相当于一个数据字典.
class tiezi
{
    public $userName ;
   
}
while ($row= mysql_fetch_array($result, MYSQL_ASSOC))
{
    $tiezi =new tiezi();
    $tiezi->userName = $row["userName"];
    
    $data[]=$tiezi;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "{$json}";
mysql_close($con);
?>