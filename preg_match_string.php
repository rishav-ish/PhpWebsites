<?php

	include "preg_match.html";
	
	$word = $_POST["word"];
	
	$text = $_POST["text"];
	
	$new = preg_replace("/$word/",'<span style="background-color:yellow">'."$word</span>",$text);
	
	echo $new;
	
?>