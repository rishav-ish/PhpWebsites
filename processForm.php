<?php


function processForm1(){
			$requiredFields = array("firstName","lastName","email","mobileNumber");
			
			$raised = array();
			
			$missingFields = array();
			
			foreach($requiredFields as $requiredField){
				if(!isset($_POST[$requiredField]) or !$_POST[$requiredField]){
					$missingFields[] = $requiredField;
				}
					
				
			}
			
						if(!empty($_POST["firstName"])){
							if(!preg_match("/^[a-zA-Z ]{1,}$/",$_POST["firstName"])){
								$raised[] = "firstName";
							}
						}
					 
			
						if(!empty($_POST["lastName"])){
							if(!preg_match("/^[a-zA-Z]{1,}$/",$_POST["lastName"])){
								$raised[] = "lastName";
							}	
						}
			
						if(!empty($_POST["email"])){
							if(!preg_match("/[a-zA-Z0-9.-_]+@[a-zA-Z]+\.+[a-z]{2,5}$/",$_POST["email"])){
								$raised[] = "email";
							}
						}
			
						if(!empty($_POST["mobileNumber"])){
							if(!preg_match("/^[0-9]{10}$/",$_POST["mobileNumber"])){
								$raised[] = "mobileNumber";
							}
						}
							
					
			
			if($missingFields or $raised){
				displayForm1($missingFields,$raised);
			}else{
				displayForm2();
			}
			
		}
?>
	