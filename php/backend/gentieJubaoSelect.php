<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);

//$tieziId = $_POST[tieziId];


$jubaoType = $_POST[jubaoType];

$sql = "select a.*,b.jubaoType,b.jubaoUserName,b.beijubaoUserName,b.jubaoReason,b.jubaoDate,c.tieziTitle from 
(select * from Gentie )a
inner join
(select * from Jubao )b
on a.gentieId = b.gentieId
inner JOIN 
(select * from Tiezi)c
on a.tieziId = c.tieziId
WHERE b.jubaoType = '$jubaoType'";
//order by a.gentieId asc";


$result =mysql_query($sql);//执行SQL
$json ="";
$data =array(); //定义好一个数组.PHP中array相当于一个数据字典.
class tiezi
{
    public $gentieId;
    public $userName;
    public $tieziId;
    public $floorNum;
    public $gentieContent;
    public $gentieCreaterData;
    public $beigentieFloorNum;
	public $beigentieContent;
	public $beigentieUserName;
	public $dianzanCount;
	public $caiCount;
	
	public $jubaoType;
	public $jubaoUserName;
	public $beijubaoUserName;
	public $jubaoReason;
	public $jubaoDate;
	
	public $tieziTitle;
}
while ($row= mysql_fetch_array($result, MYSQL_ASSOC))
{
    $tiezi =new tiezi();
    $tiezi->gentieId = $row["gentieId"];
    $tiezi->userName = $row["userName"];
    $tiezi->tieziId = $row["tieziId"];
    $tiezi->floorNum = $row["floorNum"];
    $tiezi->gentieContent = $row["gentieContent"];
    $tiezi->gentieCreaterData = $row["gentieCreaterData"];
    $tiezi->beigentieFloorNum = $row["beigentieFloorNum"];
	$tiezi->beigentieContent = $row["beigentieContent"];
	$tiezi->beigentieUserName = $row["beigentieUserName"];
	$tiezi->dianzanCount = $row["dianzanCount"];
	$tiezi->caiCount = $row["caiCount"];
	
	$tiezi->jubaoType = $row["jubaoType"];
	$tiezi->jubaoUserName = $row["jubaoUserName"];
	$tiezi->beijubaoUserName = $row["beijubaoUserName"];
	$tiezi->jubaoReason = $row["jubaoReason"];
	$tiezi->jubaoDate = $row["jubaoDate"];
	
	$tiezi->tieziTitle = $row["tieziTitle"];
    $data[]=$tiezi;
}
$json = json_encode($data);//把数据转换为JSON数据.
echo "{$json}";
mysql_close($con);
?>