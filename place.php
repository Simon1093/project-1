<?	
	include ("blocks/db.php");
	if (isset($_GET['num'])) {$num=$_GET['num'];} 
	
	$result1 = mysql_query ("SELECT id_cat, name FROM Category", $db);
	$myrow1 = mysql_fetch_array($result1);

	$result3 = mysql_query ("SELECT * FROM Place WHERE id_place = $num", $db);
	$myrow3 = mysql_fetch_array($result3); 

	
?>

<!DOCTYPE html>
<html lang="rus">
<head>
<title><?php echo $myrow3['name']?></title>
<link rel="shortcut icon" href="images/g.jpg" type="image/x-icon">
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="styles/style.css" />
<link type="text/css" rel="stylesheet" href="styles/skin.css" />

<link rel="stylesheet" href="dist/css/lightbox.min.css" type="text/css" media="screen" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="js/initSlider.js"></script>


</head>

<body class="home">
<div id="wrap">
<script type="text/javascript" src="dist/js/lightbox-plus-jquery.min.js"></script>

  <? include ("blocks/header.php"); ?>
   
    <? include("blocks/nav_menu.php"); ?>
 <? include("index1.php"); ?>
   
   <div id="featured-section" style = "padding: 15px; width: 1020px;">
		
  <?php
		printf("
		
				<p style = 'font-size: 26px; float: bottom; padding-top:50px; font-weight:bold;'>%s</p> 
				<img style = 'width:200px; height:200px; margin: 20px; border-radius: 45px; float: left;' src = '%s'>
			
			<div id = 'contacts'>
				<b>Адрес:</b>
				<p>%s</p>
				<b>Телефон для справок:</b>
				<p>%s</p>
				<b>Официальный сайт:</b>
				<a href = '%s' target='_blank'>%s</a>
			</div>
			
			<div style = 'font-size:25px; padding: 7px;'>%s</div>",
		$myrow3['name'], $myrow3['Main_image'], $myrow3['adress'], $myrow3['contacts'], 
		$myrow3['main_link'], $myrow3['main_link'], $myrow3['descript']);
		
printf ("<p style = 'margin: 10px; font-size:22px; font-weight:bold'> Как нас найти: </p>
<div align = 'center' style = 'margin-top: 30px;'> %s</div>", $myrow3['Map']);

		printf ("<p style = 'margin:30px; font-size:27px; font-weight: bold;'>Фотографии:</p>%s", $myrow3['Images']);
 
  ?> 
   </div>
                    
    </div>
 
<? include ("blocks/footer.php"); ?>            

<!--end wrap-->
</body>

</html>