<?  include ("blocks/db.php");  /*Подключение блока соединения с базой данных*/
	$result1 = mysql_query ("SELECT id_cat, Image FROM Category", $db); /*Выборка из базы данных*/
	$myrow = mysql_fetch_array($result1); /*создание массива элементов, выбранных из базы данных*/
?>

<div id="featured-section">
    <div class ="circles"> 
		
		<?php  /*Вывод элементов, выбранных из базы данных*/
		if (mysql_num_rows($result1)>0){
			do {	
				printf("<a href = 'category.php?cat=%s'> %s </a> ", $myrow['id_cat'], $myrow['Image']);
			}
			while ($myrow = mysql_fetch_array($result1)); 
	}
		?> 
		
	</div>
    <!--end circles-->
	
  </div>
  <!--end featured-section-->