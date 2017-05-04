<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);

//$tieziId = $_POST[tieziId];


$jubaoType = $_POST[jubaoType];

$sql = "select a.*,b.jubaoType,b.jubaoUserName,b.beijubaoUserName,b.jubaoReason,b.jubaoDate from 
(select * from Tiezi )a
inner join
(select * from Jubao )b
on a.tieziId = b.tieziId
WHERE b.jubaoType = '$jubaoType'";
//order by a.gentieId asc";


$result =mysql_query($sql);//执行SQL
$json ="";
$data =array(); //定义好一个数组.PHP中array相当于一个数据字典.
class tiezi
{
    public $tieziId;
    public $tieziTitle;
    public $tieziContent;
    public $tieziTag;
    public $tieziSection;
    public $tieziScore;
    public $tieziCreater;
	public $tieziCreaterData;
	public $tieziAnswer;
	public $tieziLastAnswer;
	public $tieziLastAnswerDate;
	public $tieziOverhead;
	
	public $jubaoType;
	public $jubaoUserName;
	public $beijubaoUserName;
	public $jubaoReason;
	public $jubaoDate;
	
}
while ($row= mysql_fetch_array($result, MYSQL_ASSOC))
{
    $tiezi =new tiezi();
    $tiezi->tieziId = $row["tieziId"];
    $tiezi->tieziTitle = $row["tieziTitle"];
    $tiezi->tieziContent = $row["tieziContent"];
    $tiezi->tieziTag = $row["tieziTag"];
    $tiezi->tieziSection = $row["tieziSection"];
    $tiezi->tieziScore = $row["tieziScore"];
    $tiezi->tieziCreater = $row["tieziCreater"];
	$tiezi->tieziCreaterData = $row["tieziCreaterData"];
	$tiezi->tieziAnswer = $row["tieziAnswer"];
	$tiezi->tieziLastAnswer = $row["tieziLastAnswer"];
	$tiezi->tieziLastAnswerDate = $row["tieziLastAnswerDate"];
	$tiezi->tieziOverhead = $row["tieziOverhead"];
	
	$tiezi->jubaoType = $row["jubaoType"];
	$tiezi->jubaoUserName = $row["jubaoUserName"];
	$tiezi->beijubaoUserName = $row["beijubaoUserName"];
	$tiezi->jubaoReason = $row["jubaoReason"];
	$tiezi->jubaoDate = $row["jubaoDate"];
	
    $data[]=$tiezi;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "{$json}";
mysql_close($con);
?>