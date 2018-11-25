<?php
     
	//preg_split ...
	
	$my_text = "I Love Regular Expressions.";
	
	$my_array = preg_split("/ /",$my_text);
	
	print_r($my_array);
?>