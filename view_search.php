<?php include ("blocks/db.php");

	if (isset ($_POST['submit_s'])) $submit_s = $_POST['submit_s'];
	if (isset ($_POST['search'])) $search = $_POST['search'];
	
	$search = trim($search); //удаление пробелов
	$search - stripslashes($search); // допуск кавычек
	$search = htmlspecialchars($search); //защита от ввода тегов
?>	
	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo "Список статей по запросу - $search"; ?></title>
<link rel="shortcut icon" href="images/g.jpg" type="image/x-icon">
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="styles/style.css" />
	<link type="text/css" rel="stylesheet" href="styles/skin.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="js/initSlider.js"></script>
</head>

<body class="home">

	<div id="wrap">
		<? include ("blocks/header.php"); ?>
		<? include("blocks/nav_menu.php"); ?>
   
   <div id="featured-section" style = "padding: 15px; width: 1020px;">	
	
	 <?php 
			if (isset ($submit_s)){
		if (empty($search) or (strlen($search)/2) < 4){
			echo("<p style = 'font-size:22px; padding:50px;'>Вы не ввели текст в поисковое поле или он не превышает 4 символов </p>");
			include ("blocks/footer.php");
			exit();
		}
	}
	else{
		echo("<p style = 'font-size:22px; padding:50px;'>Вы обратились к файлу без необходимых параметров</p>");
		include ("blocks/footer.php");
		exit();
	}
			$result5 = mysql_query ("SELECT Main_image,id_place, name, descript FROM Place WHERE name LIKE  '%$search%' ", $db);
			
			if (!$result5){
				echo "<p style = 'font-size:22px; padding:50px;'>Запрос к базе данных не прошел, обратитесь к администратору <br>
				<strong>Код ошибки:</:</strong></p>";
				include ("blocks/footer.php");
				mysql_error();
				exit ();
			}
					 
			if (mysql_num_rows($result5)>0){
				$myrow5 = mysql_fetch_array($result5); 
			}
				else {
					echo "<p style = 'font-size:22px; padding:50px;'>Информация по вашему запросу на сайте не найдена </p>";
					include ("blocks/footer.php");
					exit();
				}
				
				printf ("<p style = 'padding-top:10px; font-size:20px; font-weight:bold;'>Список мест по запросу '%s':</p>", $search);

				do{
					$n = "place.php?num=%s";
					if ($myrow5['id_place'] > 32 && $myrow5['id_place'] < 38) 
						$n = "others.php?num=%s";
	
					printf("
					
					<a href = '$n'> 
						<p style = 'font-size: 28px; padding-top:50px;'>%s</p> 
						<img style = 'width:200px; height:200px; margin: 20px; border-radius: 45px; float: left;' src = '%s'>
					</a>
					<div style = 'height: 250px; width: 1020px;'>
						<div id = 'description'>%s
							<a href = '$n'><h3 style = 'margin: 20px;'>Читать далее..</h3></a>
						</div>
					</div>",
					$myrow5['id_place'],$myrow5['name'], $myrow5['Main_image'], $myrow5['descript'], $myrow5['id_place']);
				} while ($myrow5 = mysql_fetch_array ($result5)); 
					
			?>
					
				
		</div>
   <? include ("blocks/footer.php"); ?>
</div>

</body>

</html>