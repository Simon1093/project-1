<?php include ("blocks/db.php");
	if (isset($_GET['num'])) {$num=$_GET['num'];}
	$result2 = mysql_query ("SELECT id_place, name, adress FROM Others WHERE id_place = $num",$db);
	if (mysql_num_rows($result2)>0){
		$myrow = mysql_fetch_array($result2); 
	}
	$result1 = mysql_query ("SELECT id_cat, name FROM Category", $db);
	$myrow1 = mysql_fetch_array($result1); 	
	
	//$result4 = mysql_query ("SELECT name, side_image FROM Category WHERE id_cat = $cat", $db);
	//$myrow4 = mysql_fetch_array($result4); 
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

<div id="wrap">
	<? include ("blocks/header.php"); 
	include("blocks/nav_menu.php"); ?>

   
   <div id="featured-section" style = "padding: 15px; width: 100%;">
		
		<?php
		do {
			printf("
		
					<p style = 'float: left; font-size: 28px; padding-top:20px; color:#2684CD;'>%s</p> 
				
				<div style = 'height: 70px; width: 820px;'>
					<div style = 'float: left; font-size: 25px; margin-top:20px; padding-left:10px;'>-  %s</div>
				</div>",
		$myrow['name'],  $myrow['adress']);
	}
	while ($myrow = mysql_fetch_array($result2));
  ?> 
   

</div>
   <? include ("blocks/footer.php"); ?>
</div>

</body>

</html>