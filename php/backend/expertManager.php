<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);



$sql = "select a.*,b.requireId,b.relName,b.major,b.company,b.job,b.email,b.advantage,b.requireDate,b.requireState from 
(select * from Users )a
inner join
(select * from ExpertRequire)b
on a.userId = b.userId";
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
	public $relName;
	public $major;
	public $company;
	public $job;
	public $email;
	public $advantage;
	public $requireDate;
	public $requireState;
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
	$tiezi->relName = $row["relName"];
	$tiezi->major = $row["major"];
	$tiezi->company = $row["company"];
	$tiezi->job = $row["job"];
	$tiezi->email = $row["email"];
	$tiezi->advantage = $row["advantage"];
	$tiezi->requireDate = $row["requireDate"];
	$tiezi->requireState = $row["requireState"];
    $data[]=$tiezi;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "{$json}";
mysql_close($con);
?>