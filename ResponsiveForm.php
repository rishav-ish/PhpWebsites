<!--one page form validation and verification with thanks giving cards....-->
<!DOCTYPE html>
<html>
<head>
	<title>Responsive Form</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "ResponsiveForm.css">
	<style>
		.error{
			color:red;
		}
	</style>
</head>

<body>
	<?php
	
	
	    function sayThanks(){
			?>
			
			<div class = "sayThanks">
				Hello <span style = "color:red"><?php echo $_POST["firstName"];?></span>, you have completed your login, your credential information
				will be send to your mail shortly
			</div>
			
		<?php }
		
		function displayForm($missingFields,$raised){
			?>
			
			<div class = "container">
				<h2>Registration Form</h2>
				
				<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				
				<?php if($missingFields){
					echo '<p>Please fill the field marked with asterisk *</p>';
				}else{
					echo "<p>Enter your data</p>";
				}
				?>
				
					<label for = "firstName">First Name<span <?php validateField("firstName",$missingFields);?>>*</span></label>
					<span class = "loud"><?php validateError("firstName",$raised);?></span>
					
					<input type = "text" id = "firstName" name = "firstName" class = "modify" value = "<?php setValue("firstName");?>">
					
					<label for = "lastName">Last Name<span <?php validateField("lastName",$missingFields);?>>*</span></label>
					<span class = "loud"><?php validateError("lastName",$raised);?></span>
					
					<input type = "text" id = "lastName" name = "lastName" class = "modify" value = "<?php setValue("lastName");?>">
					
					
					<label for = "email">Email<span <?php validateField("email",$missingFields);?>>*</span></label>
					<span class = "loud"><?php validateError("email",$raised);?></span>
					<input type = "text" id = "email" name = "email" class = "modify" value = "<?php setValue("email")?>">
					
					<label for = "mobileNumber">Mobile Number<span <?php validateField("mobileNumber",$missingFields);?>>*</span></label>
					<span class = "loud"><?php validateError("mobileNumber",$raised);?></span>
					<input type = "text" id = "mobileNumber" name = "mobileNumber" class = "modify" value = "<?php setValue("mobileNumber")?>">
					
					
					
					<label for = "male">Male</label>
					<input type = "radio" value = "male" name = "gender" id = "male" <?php setChecked("gender","male")?>>
					
					<label for = "female">Female</label>
					<input type = "radio" value = "female" name= "gender" id = "female" <?php setChecked("gender","female")?>>
					
					<label for = "special">Special</label>
					<input type = "radio" value = "special" name = "gender" id = "special" <?php setChecked("gender","special")?>>
					<br>
					<input type = "submit" name = "submitButton" value = "submit" class = "button" id = "submitButton">
					<input type = "button" name = "resetButton" value = "reset" class = "button" id = "resetButton">
				</form>
			</div>
			<?php
		}
		
		function processForm(){
			$requiredFields = array("firstName","lastName","email","mobileNumber");
			
			$raised = array();
			
			$missingFields = array();
			
			foreach($requiredFields as $requiredField){
				if(!isset($_POST[$requiredField]) or !$_POST[$requiredField]){
					$missingFields[] = $requiredField;
				}
					
				
			}
			
						if(!empty($_POST["firstName"])){
							if(!preg_match("/[a-zA-Z]/",$_POST["firstName"])){
								$raised[] = "firstName";
							}
						}
					 
			
						if(!empty($_POST["lastName"])){
							if(!preg_match("/[a-zA-Z]/",$_POST["lastName"])){
								$raised[] = "lastName";
							}	
						}
			
						if(!empty($_POST["email"])){
							if(!preg_match("/[a-zA-Z0-9.-_]+@[a-zA-Z]+\.+[a-z]/",$_POST["email"])){
								$raised[] = "email";
							}
						}
			
						if(!empty($_POST["mobileNumber"])){
							if(!preg_match("/[0-9]{10}/",$_POST["mobileNumber"])){
								$raised[] = "mobileNumber";
							}
						}
							
					
			
			if($missingFields or $raised){
				displayForm($missingFields,$raised);
			}else{
				sayThanks();
			}
			
		}
		
		function test_input($test){
			return htmlspecialchars($test);
		}
		
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			processForm();
		}else{
			displayForm();
		}
		
		function setValue($fieldName){
			if(isset($_POST[$fieldName])){
				$fieldValue = test_input($_POST[$fieldName]);
				
				echo $fieldValue;
			}
		}
		
		function setChecked($fieldName,$fieldValue){
			if(isset($_POST[$fieldName]) and $_POST[$fieldName]==$fieldValue){
				echo 'checked = "checked"';
			}
		}
		
		function validateField($fieldName,$missingFields){
			if(in_array($fieldName,$missingFields)){
				echo ' class = "error"';
			}
		}
		
		
		
		
		function validateError($fieldName,$raised){
				if(in_array($fieldName,$raised)){
					echo produceError($fieldName);
				}
			}
			
		function produceError($fieldName){
			
			switch($fieldName){
				case "firstName":
					return "Not look like a name";
					
				case "lastName":
					return "Not look like a surname";
					
				case "email":
					return "Not a valid email Id";
					
				case "mobileNumber":
					return "Not a valid mobileNumber";
			}	
			
		}
		
		
	?>
	
	<script>
		function emptyData(){
			document.getElementById("firstName").value = "";
			document.getElementById("lastName").value = "";
			document.getElementById("email").value = "";
			document.getElementById("mobileNumber").value = "";
			document.getElementById("male").checked = "";
			document.getElementById("female").checked = "";
			document.getElementById("special").checked = "";
		
			
			}
		
		document.getElementById("resetButton").addEventListener("click",emptyData);
		document.getElementById("resetButton").addEventListener("click",function(){ var el = document.getElementsByClassName("loud"); var i; for(i=0;i<el.length;i++){ el[i].style.display = "none"; } });
		document.getElementById("resetButton").addEventListener("click",function(){ var el = document.getElementsByClassName("error"); var i = 0; for(i=0;el.length;i++){ el[i].style.color = "purple"; } });
	</script>
	
</body>
</html>
