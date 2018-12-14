<?php
	
	session_start();
	
	define("USERNAME","john");
	define("PASSWORD","secret");
	
	if(isset($_SESSION["login"])){
		login();
	}elseif(isset($_GET)