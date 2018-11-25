<?php
	
	$text = "We at Guru99 strive to make quality education affordable to the masses. Guru99.com";
	
	$text = preg_replace("/Guru/",'<span style="background-color:yellow">Guru</span>',$text);
	
	echo $text;
?>