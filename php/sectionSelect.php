<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);


$sql = "select * from Section";
$result =mysql_query($sql);//执行SQL
$json ="";
$data =array(); //定义好一个数组.PHP中array相当于一个数据字典.
class tiezi
{
    public $sectionId;
	public $sectionName;
	public $sectionIntroduce;
	public $sectionCreatedDate;
   
}
while ($row= mysql_fetch_array($result, MYSQL_ASSOC))
	
{
	//echo $row["sectionId"];
    $tiezi =new tiezi();
    $tiezi->sectionId = $row["sectionId"];
	$tiezi->sectionName = $row["sectionName"];
	$tiezi->sectionIntroduce = $row["sectionIntroduce"];
	$tiezi->sectionCreatedDate = $row["sectionCreatedDate"];
    
    $data[] = $tiezi;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "{$json}";
mysql_close($con);
?>