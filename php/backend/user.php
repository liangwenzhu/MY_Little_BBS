<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);

$orderByKey = $_POST[orderByKey];
$order = $_POST[order];
//$pagenum = $_POST[pageNum];
//$tiezimaxnum = $_POST[tieziMaxNum];

//$from = ($pagenum-1)*$tiezimaxnum;
//$to = $from+$tiezimaxnum;

$sql = "select * from Users
order by $orderByKey $order
limit 0,100";
$result =mysql_query($sql);//执行SQL
$json ="";
$data =array(); //定义好一个数组.PHP中array相当于一个数据字典.
class tiezi
{
    public $userId ;
    public $userName ;
    public $passWord ;
    public $userSign ;
    public $userHead ;
    public $userScore ;
    public $userFatieCount ;
    public $userGentieCount ;
    public $userUpVoteCount ;
	public $userCreatedData ;
}
while ($row= mysql_fetch_array($result, MYSQL_ASSOC))
{
    $tiezi =new tiezi();
    $tiezi->userId = $row["userId"];
    $tiezi->userName = $row["userName"];
    $tiezi->passWord = $row["passWord"];
    $tiezi->userSign = $row["userSign"];
    $tiezi->userHead = $row["userHead"];
    $tiezi->userScore = $row["userScore"];
    $tiezi->userFatieCount = $row["userFatieCount"];
    $tiezi->userGentieCount = $row["userGentieCount"];
    $tiezi->userUpVoteCount = $row["userUpVoteCount"];
	$tiezi->userCreatedData = $row["userCreatedData"];
    $data[]=$tiezi;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "{$json}";
mysql_close($con);
?>