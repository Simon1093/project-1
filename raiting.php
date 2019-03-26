<?php 

if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
{
echo "Вы поставили оценку ".$_GET["user_votes"];
$GET = $_GET["user_votes"];
$num = $_GET["id_arc"];

include ("blocks/db.php");
$result9 = mysql_query ("SELECT * FROM Place WHERE id_place = $num", $db);
$myrow9 = mysql_fetch_array($result9); 


$Get = ($GET + $myrow9['rating'])/2;

$result4 = mysql_query ("UPDATE Place SET rating = $Get WHERE id_place = $num", $db);
}
?>