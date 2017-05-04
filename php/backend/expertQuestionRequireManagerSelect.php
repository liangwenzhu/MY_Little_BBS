<?php
include ('conn.php');

$questionRequireId = $_POST[questionRequireId];

$sql = "select a.*,b.relName,b.advantage,c.userName,c.userHead from 
(select * from ExpertQuestionRequire)a
inner join
(select * from Expert)b
on a.expertId = b.expertId
inner join
(select * from Users)c
on a.userId = c.userId
WHERE a.questionRequireId = '$questionRequireId'";
$result = mysql_query($sql);
$results = array();
/*while ($row = mysql_fetch_assoc($result)) {
    $results[] = $row;
}*/
$row = mysql_fetch_assoc($result);
$str = json_encode($row);
echo preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $str);

    mysql_close($con);
?>