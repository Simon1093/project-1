<?php 
$db = mysql_connect("127.0.0.1","u257429907_user","qPN96y3u7U");
if (!$db) {
    die('Ошибка соединения: ' . mysql_error());
}
mysql_select_db("u257429907_gorod",$db);
?>