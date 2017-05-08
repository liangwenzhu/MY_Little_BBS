<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);



$sql = "select a.*,b.requireId,b.requireReason,b.requireDate,b.requireState,b.confirmDate,c.sectionId,c.sectionName from 
(select * from Users )a
inner join
(select * from ManangerRequire)b
on a.userId = b.userId
inner join
(select * from Section)c
on b.sectionId = c.sectionId";
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
	
	public $requireId;
	public $requireReason;
	public $requireDate;
	public $requireState;
	public $confirmDate;
	
	public $sectionId;
	public $sectionName;
	
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
	
	$tiezi->requireId = $row["requireId"];
	$tiezi->requireReason = $row["requireReason"];
	$tiezi->requireDate = $row["requireDate"];
	$tiezi->requireState = $row["requireState"];
	$tiezi->confirmDate = $row["confirmDate"];
	
	$tiezi->sectionId = $row["sectionId"];
	$tiezi->sectionName = $row["sectionName"];
	
    $data[]=$tiezi;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "{$json}";
mysql_close($con);
?>