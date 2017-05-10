<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);


$sql = "select * from Section";
$result =mysql_query($sql);//执行SQL
$json = "";
$data =array(); //定义好一个数组.PHP中array相当于一个数据字典.
class tiezi
{
    public $sectionId;
	public $sectionName;
	public $sectionIntroduce;
	public $sectionCreatedDate;
	public $sectionEditordDate;
	
	public $managerJsonDataObj;
}
class manager{
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
			
			public $sectionId;
		}

 $B = mysql_num_rows($result);
 //echo $B;
//最外层循环，查板块信息。
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
	
	
	//嵌套循环查询开始，取到当前板块Id

	$managerSectionId = $row["sectionId"];
	
	//echo $row["sectionId"];
	
	$sectionManagerSelectSql = "select a.*,b.sectionId from 
								(select * from Users)a
								inner join	
								(select * from Mananger)b	
								on a.userId = b.userId
								where b.sectionId = '$managerSectionId'";
		
			
	//执行该SQL语句
	$sectionManagerSelectResult = mysql_query($sectionManagerSelectSql);
	//创建版主用户JSON空对象
	//$managerJson ="";
	
	//创建数组，将结果插入该数组内。
	//$managerData = array(); 
	
	//首先，先进行判断，是否有该板块有版主。							
	$sectionManagerSelectResultRow = mysql_num_rows($sectionManagerSelectResult);
	if($sectionManagerSelectResultRow < 1){
	//echo $sectionManagerSelectResultRow;
		//exit;
		$managerJson ="";	
		$managerData = array(); 
		
		//$A = mysql_fetch_array($sectionManagerSelectResult);
			//echo $A["userName"];
		
	}
	else{
			
			//判断开始
			//echo"not exit";
			//exit;
		$managerJson ="";	
		$managerData = array(); 
			
		while ($sectionManagerSelectSqlRow = mysql_fetch_array($sectionManagerSelectResult, MYSQL_ASSOC))
		{
			$manager =new manager();
			 
			$manager->userId = $sectionManagerSelectSqlRow["userId"];
			$manager->userName = $sectionManagerSelectSqlRow["userName"];
			$manager->passWord = $sectionManagerSelectSqlRow["passWord"];
			$manager->userSign = $sectionManagerSelectSqlRow["userSign"];
			$manager->userHead = $sectionManagerSelectSqlRow["userHead"];
			$manager->userScore = $sectionManagerSelectSqlRow["userScore"];
			$manager->userFatieCount = $sectionManagerSelectSqlRow["userFatieCount"];
			$manager->userGentieCount = $sectionManagerSelectSqlRow["userGentieCount"];
			$manager->userUpVoteCount = $sectionManagerSelectSqlRow["userUpVoteCount"];
			$manager->userCreatedData = $sectionManagerSelectSqlRow["userCreatedData"];
			
			$manager->sectionId = $sectionManagerSelectSqlRow["sectionId"];
			
			//echo $sectionManagerSelectSqlRow["userName"];
			
			$managerData[] = $manager;
		}
	
		$managerJson = json_encode($managerData);//把数据转换为JSON数据.
		//$managerJson = "{$managerJson}";
		//echo $managerJson;
		//查询开始
				
		//判断结束;		
	}
	
	//echo $managerJson;
	
	//循环结束，现在在最外层的while循环体内
	/**/
    $tiezi =new tiezi();
    $tiezi->sectionId = $row["sectionId"];
	$tiezi->sectionName = $row["sectionName"];
	$tiezi->sectionIntroduce = $row["sectionIntroduce"];
	$tiezi->sectionCreatedDate = $row["sectionCreatedDate"];
	$tiezi->sectionEditordDate = $row["sectionEditordDate"];
	
	//将循环的结果插入最外层数组中
    $tiezi->managerJsonDataObj = $managerData;
	//$tiezi->managerJsonDataObj = 1;
    $data[] = $tiezi;
	//echo $json;
	//echo $managerJson;
	//echo $row["sectionId"];
	//echo $managerSectionId;
	//echo $row["sectionId"];
}
$json = json_encode($data);//把数据转换为JSON数据.
echo $json;

//echo "{$json}";
mysql_close($con);
?>