<?php include ("blocks/db.php");
	if (isset($_GET['cat'])) {$cat=$_GET['cat'];}
	$result2 = mysql_query ("SELECT id_place, name, descript, Main_image FROM Place WHERE id_cat = $cat",$db);
	if (mysql_num_rows($result2)>0){
		$myrow = mysql_fetch_array($result2); 
	}
	$result1 = mysql_query ("SELECT id_cat, name FROM Category", $db);
	$myrow1 = mysql_fetch_array($result1); 	
	
	$result4 = mysql_query ("SELECT name, side_image FROM Category WHERE id_cat = $cat", $db);
	$myrow4 = mysql_fetch_array($result4); 
?>


<!DOCTYPE html>
<html lang="rus">
<head>
<title><?php  echo $myrow4['name'];?></title>
<meta charset="utf-8">
<link rel="shortcut icon" href="images/g.jpg" type="image/x-icon">
<link type="text/css" rel="stylesheet" href="styles/style.css" />
<link type="text/css" rel="stylesheet" href="styles/skin.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="js/initSlider.js"></script>

</head>
<body class="home">

<!--<div style = 'width: 40%; background-color:green; height: 1360px; position: absolute; right:0;'><img src = <?printf("%s",$myrow4['side_image']);?> style = 'float: left; height: 1360px; width: 1100px;'/></div>
<div style = 'width: 40%; background-color:green; height: 1360px; position: absolute; left:0;'><img src = <?printf("%s",$myrow4['side_image']);?> style = 'float: right; height: 1360px; width: 1100px;'/></div>-->


<div id="wrap">
	<? include ("blocks/header.php"); ?>
 
	<? include("blocks/nav_menu.php"); ?>
   
   <div id="featured-section" style = "padding: 15px; width: 100%; border: none;">
		
		<?php
		do {
$n = "place.php?num=%s";
		if ($myrow['id_place'] > 32 && $myrow['id_place'] < 38) {$n = "others.php?num=%s";}
		
			printf("
		
				<a href = '$n'> 
					<p style = 'font-size: 28px; padding-top:50px;'>%s</p> 
					<img style = 'width:200px; height:200px; margin: 20px; border-radius: 45px; float: left;' src = '%s'>
				</a>
				<div style = 'height: 250px; width: 1020px; border-bottom: 2px solid grey;'>
					<div id = 'description'>%s
						<a href = '$n'><h3 style = 'margin: 20px;'>Просмотр..</h3></a>
					</div>
				</div>",
		$myrow['id_place'],$myrow['name'], $myrow['Main_image'], $myrow['descript'], $myrow['id_place']);
	}
	while ($myrow = mysql_fetch_array($result2));
  ?> 
   

</div>
   <? include ("blocks/footer.php"); ?>
</div>

</body>

</html>