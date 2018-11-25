<?php

  //we are going to perform regular expression that will be amazing indeed....
  
  echo "Regular expression are powerful pattern matching algorithm that can be performed in a single expression.";
  
  echo "Regular expression use arithmetic operators such as (+,-,^) to create complex expressions.";
  
  echo "Regular expression help you accomplish task such as validating email address, IP address etc.";
  
  /*
     php has following bulit in function to perform regular expression operation...
	 preg_match
	 preg_split
	 preg_replace
	 
	 <?php
	     function_name('/pattern/',subject);
	 ?>
  */
  
  $my_url = "www.guru99.com";
  
  if(preg_match("/guru/",$my_url)){
	  echo "The url $my_url contains guru";
  }else{
	  echo "The url $my_url does not contain guru";
  }
?>