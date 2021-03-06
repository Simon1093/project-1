<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body
{margin:0;}
#raiting {position:relative; height:16px; cursor:pointer; width:83px; float:left} /* Блок рейтинга*/
#raiting_blank, #raiting_votes, #raiting_hover {height:16px; position:absolute}
#raiting_blank { background:url(images/ratings.png); width:83px; } /* "Чистые" звездочки */
#raiting_votes {background:url(images/ratings.png) 0 -16px} /*  Закрашенные звездочки */ 
#raiting_hover {background:url(images/ratings.png) 0 -32px; display:none}  /*  звездочки при голосовании */ 
#raiting_info {margin-left:100px}
#raiting_info img{vertical-align:middle; margin:0 5px; display:none}
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.cookies.js"></script>
<script type="text/javascript">
$(document).ready(function(){
total_reiting = <?php echo $myrow3['rating'];   ?>; // итоговый рейтинг
id_arc = <?php  echo $num; ?>; // id статьи 
var star_widht = total_reiting*17 ;
$('#raiting_votes').width(star_widht);
$('#raiting_info h5').append(total_reiting);
he_voted = $.cookies.get('article'+id_arc); // проверяем есть ли кука?
if(he_voted == null){
$('#raiting').hover(function() {
      $('#raiting_votes, #raiting_hover').toggle();
	  },
	  function() {
      $('#raiting_votes, #raiting_hover').toggle();
});
var margin_doc = $("#raiting").offset();
$("#raiting").mousemove(function(e){
	var widht_votes = e.pageX - margin_doc.left;
	if (widht_votes == 0) widht_votes =1 ;
		user_votes = Math.ceil(widht_votes/17);  
	// обратите внимание переменная  user_votes должна задаваться без var, т.к. в этом случае
	// она будет глобальной и мы сможем к ней обратиться из другой ф-ции 
	//(нужна будет при клике на оценке).
	$('#raiting_hover').width(user_votes*17);
});
// отправка
$('#raiting').click(function(){
	$('#raiting_info h5, #raiting_info img').toggle();
	$.get(
	"raiting.php",
	{id_arc: id_arc, user_votes: user_votes}, 
	function(data){
		$("#raiting_info h5").html(data);
		$('#raiting_votes').width((total_reiting + user_votes)*17/2);
		$('#raiting_info h5, #raiting_info img').toggle();
		$.cookies.set('article'+id_arc, 123, {hoursToLive: 1}); // создаем куку 
		$("#raiting").unbind();
		$('#raiting_hover').hide();
	}
	   )
 });
}
});
</script>
</head>

<body>
<div id="raiting_star">
<div id="raiting">
<div id="raiting_blank"></div>
<div id="raiting_hover"></div>
<div id="raiting_votes"></div>
</div>
<div id="raiting_info">  <img src="load.gif" /> <h5> Рейтинг места: </h5></div>
</div>

</body>
</html>