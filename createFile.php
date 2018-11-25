<?php
	
	$new = fopen("hello.txt","a");
	
	$text = $_POST["thought"];
	
	fwrite($new,$text);
	
	fclose($new);
?>