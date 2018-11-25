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
		
		function displayForm($missingFields,$checkErrors){
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
					<input type = "text" id = "firstName" name = "firstName" class = "modify" value = "<?php setValue("firstName");?>">
					
					<label for = "lastName">Last Name<span <?php validateField("lastName",$missingFields);?>>*</span></label>
					<input type = "text" id = "lastName" name = "lastName" class = "modify" value = "<?php setValue("lastName");?>">
					
					<label for = "email">Email<span <?php validateField("email",$missingFields);?>>*</span></label>
					<input type = "text" id = "email" name = "email" class = "modify" value = "<?php setValue("email")?>">
					
					<label for = "mobileNumber">Mobile Number<span <?php validateField("mobileNumber",$missingFields);?>>*</span></label>
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
			
			$missingFields = array();
			
			foreach($requiredFields as $requiredField){
				if(!isset($_POST[$requiredField]) or !$_POST[$requiredField]){
					$missingFields[] = $requiredField;
				}
			}
			
			if($missingFields){
				displayForm($missingFields);
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
		
		function verifyNumber($fieldName){
			$number = $_POST[$fieldName];
			
			if(!preg_match("/[0-9]{10}/",$number)){
				
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
	</script>
	
</body>
</html>
