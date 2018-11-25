<?php
	
	$email = $_POST["email"];
	
	
	$decision = preg_match("/^[a-zA-Z0-9.-_]+@[a-zA-Z]+\.[a-zA-Z]/",$email);
	
	if($decision){
		echo "<h1>$email".'<span style = "color:green"> is a valid email.</span></h1>';
	}else{
		echo "<h1>$email".'<span style ="color:red"> is not a valid email.</span></h1>';
	}
?>
