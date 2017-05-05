<?php
$con = mysql_connect("localhost","sa","sa");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("my_db", $con);



$sql = "select a.*,b.questionTitle,b.questionIntroduce,b.questionDetailIntroduce,b.questionShowTime,
		c.userHead,
		d.advantage
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
where a.expertQuestionId = (select max(expertQuestionId) from expertQuestion)
";
$result = mysql_query($sql);
$results = array();
$row = mysql_fetch_assoc($result);
$str = json_encode($row);
echo preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $str);

    mysql_close($con);
?>