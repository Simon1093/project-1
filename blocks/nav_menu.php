<?php include ("blocks/db.php");
	$result1 = mysql_query ("SELECT id_cat, name FROM Category", $db);
	$myrow1 = mysql_fetch_array($result1); 	
?>

<div id="nav">
      <ul class="menu">
        <li><a href="index.php">Главная</a></li>
		<?php 
			do{
					if (isset($cat) && $myrow1['id_cat'] == $cat )
						printf ("<li> <a style = 'color:#2684cd!important;'  href='category.php?cat=%s'>%s</a>", $myrow1['id_cat'], $myrow1['name']); 
				
					else printf ("<li> <a  href='category.php?cat=%s'>%s</a>", $myrow1['id_cat'], $myrow1['name']); 
				
			} while ($myrow1 = mysql_fetch_array($result1));
		?>
	</ul>
    </div>