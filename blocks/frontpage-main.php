<?	include ("blocks/db.php"); ?>
<div id="frontpage-main">
    <div id="frontpage-content">
      <h3>Информация о городе:</h3>
 <p>	Таганрог – второй по величине город в Ростовской области, 
	  расположенный на северном побережье Таганрогского залива Азовского моря.
	  Его можно смело назвать городом-курортом – он привлекателен для людей, 
	  стремящихся отдохнуть на море и позагорать на городских пляжах.
	   </p>
     <p> Множество опрятных двориков, словно игрушечных домов и морской климат создают приятное впечатление, если вас радует тихая, умиротворенная и спокойная атмосфера, то этот город — то, что вам нужно.</p>
    </div>
	


	<div id="image-slider">
   <h3 style = "margin-top: 50px; font-weight: bold; padding-left: 30px;">Советуем посетить:</h3>
      <ul id="mycarousel" class="jcarousel-skin-tango">
        <?php
		$b = 1;
		do{
			$a = rand(1, 24);
			$result5 = mysql_query ("SELECT Main_image FROM Place WHERE id_place = $a", $db);
			$myrow5 = mysql_fetch_array($result5);
			printf ("<li class='first'><a href='place.php?num=%s' class='circles'><img src='%s'/></a></li>",
			$a, $myrow5['Main_image']);
			$b++;
			
		} while ($b < 11) ;
		?>
		
      </ul>
	  </div>
	</div>
<? include ("blocks/footer.php"); ?>
    <!--end frontpage-content-->