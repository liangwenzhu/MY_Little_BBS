<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);



$sql = "select a.*,b.questionTitle,b.questionIntroduce,b.questionDetailIntroduce,b.questionShowTime,
		c.userHead,
		d.advantage,d.relName
from 
(select * from expertQuestion)a
inner join
(select * from ExpertQuestionRequire)b
on a.questionRequireId = b.questionRequireId
inner join
(select * from Users)c
on a.userId = c.userId
inner join
(select * from Expert)d
on a.expertId = d.expertId
order by a.expertQuestionId desc";


$result =mysql_query($sql);//执行SQL
$json ="";
$data =array(); //定义好一个数组.PHP中array相当于一个数据字典.
class tiezi
{
	public $expertQuestionId;
    public $expertId;
    public $userId;
    public $questionRequireId;
    public $tieziId;
	
    public $questionTitle;
    public $questionIntroduce;
	public $questionDetailIntroduce;
	public $questionShowTime;
	
	public $userHead;
	
	public $advantage;
	public $relName;
	
}
while ($row= mysql_fetch_array($result, MYSQL_ASSOC))
{
    $tiezi =new tiezi();
	
    $tiezi->expertQuestionId = $row["expertQuestionId"];
    $tiezi->expertId = $row["expertId"];
    $tiezi->userId = $row["userId"];
    $tiezi->questionRequireId = $row["questionRequireId"];
    $tiezi->tieziId = $row["tieziId"];
	
	$tiezi->questionTitle = $row["questionTitle"];
	$tiezi->questionIntroduce = $row["questionIntroduce"];
	$tiezi->questionDetailIntroduce = $row["questionDetailIntroduce"];
	$tiezi->questionShowTime = $row["questionShowTime"];
	
	$tiezi->userHead = $row["userHead"];
	
	$tiezi->advantage = $row["advantage"];
	$tiezi->relName = $row["relName"];
	
    $data[]=$tiezi;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "{$json}";
mysql_close($con);
?>