<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);



$sql = "select a.*,b.expertId,c.requireId,c.relName,c.major,c.company,c.job,c.email,c.advantage,c.requireDate,c.comfirmDate 
from 
(select * from Users)a
inner join
(select * from Expert)b
on a.userId = b.userId
inner join
(select * from ExpertRequire)c
on b.requireId = c.requireId ";


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
	
	public $expertId;
	
	public $requireId;
	public $relName;
	public $major;
	public $company;
	public $job;
	public $email;
	public $advantage;
	public $requireDate;
	public $comfirmDate;
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
	
	$tiezi->expertId = $row["expertId"];
	
	$tiezi->requireId = $row["requireId"];
	$tiezi->relName = $row["relName"];
	$tiezi->major = $row["major"];
	$tiezi->company = $row["company"];
	$tiezi->job = $row["job"];
	$tiezi->email = $row["email"];
	$tiezi->advantage = $row["advantage"];
	$tiezi->requireDate = $row["requireDate"];
	$tiezi->comfirmDate = $row["comfirmDate"];
    $data[]=$tiezi;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "{$json}";
mysql_close($con);
?>