<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);



$sql = "select a.*,b.relName,b.advantage,c.userName,c.userHead from 
(select * from ExpertQuestionRequire)a
inner join
(select * from Expert)b
on a.expertId = b.expertId
inner join
(select * from Users)c
on a.userId = c.userId";


$result =mysql_query($sql);//执行SQL
$json ="";
$data =array(); //定义好一个数组.PHP中array相当于一个数据字典.
class tiezi
{	
    public $userName;
	public $userHead;
   
	public $relName;
	public $advantage;
	
	public $questionRequireId;
	public $expertId;
	public $userId;
	public $questionTitle;
	public $questionIntroduce;
	public $questionDetailIntroduce;
	public $questionRequireTime;
	public $questionShowTime;
	public $questionEditTime;
	public $questionRequireStatus;
}
while ($row= mysql_fetch_array($result, MYSQL_ASSOC))
{
    $tiezi =new tiezi();
    $tiezi->userName = $row["userName"];
	$tiezi->userHead = $row["userHead"];
	
    $tiezi->relName = $row["relName"];
	$tiezi->advantage = $row["advantage"];
	
    $tiezi->questionRequireId = $row["questionRequireId"];
    $tiezi->expertId = $row["expertId"];
    $tiezi->userId = $row["userId"];
    $tiezi->questionTitle = $row["questionTitle"];
    $tiezi->questionIntroduce = $row["questionIntroduce"];
	$tiezi->questionDetailIntroduce = $row["questionDetailIntroduce"];
	$tiezi->questionRequireTime = $row["questionRequireTime"];
	$tiezi->questionShowTime = $row["questionShowTime"];
	$tiezi->questionEditTime = $row["questionEditTime"];
	$tiezi->questionRequireStatus = $row["questionRequireStatus"];
	
	
    $data[]=$tiezi;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "{$json}";
mysql_close($con);
?>