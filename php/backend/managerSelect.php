<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);

//$tieziId = $_POST[tieziId];

//$sql = "select * from Gentie
//order by floorNum asc
//limit 0,$tiezimaxnum";
/*
$sql = "select a.*,b.userSign,b.userHead from 
(select * from Gentie )a
left join
(select * from Users )b
 on a.userName = b.userName
left JOIN 
(select tieziId from Tiezi)c
on a.tieziId = c.tieziId
WHERE a.tieziId = '$tieziId'
order by a.gentieId asc";
*/

$sql = "select a.*,b.advantage,b.requireDate from 
(select * from Users )a
inner join
(select * from Mananger )b
on a.userName = b.userName";
//order by a.gentieId asc";


$result =mysql_query($sql);//执行SQL
$json ="";
$data =array(); //定义好一个数组.PHP中array相当于一个数据字典.
class tiezi
{
    public $userId;
    public $userName;
    public $userSign;
    public $userHead;
    public $userScore;
    public $userFatieCount;
    public $userGentieCount;
	public $userUpVoteCount;
	public $userCreatedData;
	public $advantage;
	public $requireDate;
}
while ($row= mysql_fetch_array($result, MYSQL_ASSOC))
{
    $tiezi =new tiezi();
    $tiezi->userId = $row["userId"];
    $tiezi->userName = $row["userName"];
    $tiezi->userSign = $row["userSign"];
    $tiezi->userHead = $row["userHead"];
    $tiezi->userScore = $row["userScore"];
    $tiezi->userFatieCount = $row["userFatieCount"];
    $tiezi->userGentieCount = $row["userGentieCount"];
	$tiezi->userUpVoteCount = $row["userUpVoteCount"];
	$tiezi->userCreatedData = $row["userCreatedData"];
	$tiezi->advantage = $row["advantage"];
	$tiezi->requireDate = $row["requireDate"];
    $data[]=$tiezi;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "{$json}";
mysql_close($con);
?>