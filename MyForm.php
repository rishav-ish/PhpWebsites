<!DOCTYPE html>
<html>
<head>
	<title>Membership Form</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
</head>

<body>
	<?php
		
		if(isset($_POST["submitButton"])){
			processForm();
		}else{
			displayForm();
		}
		
		function setValue($fieldName){
			if(isset($_POST[$fieldName])){
				echo $_POST[$fieldName];
			}
		}
		
		function validateField($fieldName,$missingFields){
			if(in_array($fieldName,$missingFields)){
				echo 'class = "error"';
			}
		}
		
		function setChecked($fieldName,$fieldValue){
			if(isset($_POST[$fieldName]) and $_POST[$fieldName] == $fieldValue){
				echo 'checked = "checked"';
			}
		}
		
		function setSelected($fieldName,$fieldValue){
			if(isset($_POST[$fieldName]) and $_POST[$fieldName]==$fieldValue){
				echo 'selected = "selected"';
			} 
		}
		
		function processForm(){
			$requiredFields = array("firstName","lastName","password1","password2","gender");
			$missingFields = array();
			
			foreach($requiredFields as $requiredField){
				if(!isset($_POST[$requiredField]) or !$_POST[$requiredField]){
					$missingFields[] = $requiredField;
				}
			}
			
			if($missingFields){
				displayForm($missingFields);
			}else{
				displayThanks();
			}
		}
		
		
		function displayForm($missingFields){
			?>
			
			<h1>Membership form</h1>
			<?php if($missingFields){?>
				<p class = "error">There were some problems with the form you submitted.Please complete the fields highlighted below and click send 
				Details to resend the form.</p>
				
			<?php } else {?>
					<p>Thanks for choosing to join The Widget Club. To register, please fill in your details below and click
					 Send Details. Fields marked with an asterisk(*) are required.</p>
					 
			<?php }?>
			
				<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
					<div style = "width:30em;">
						<label for = "firstName" <?php validateField("firstName",$missingFields)?>>First Name *</label>
						<
				}
			}
		}