<!--My Form -->
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
	
</head>

<body>
	<?php
	
		$firstName = $lastName = $email = $mobileNumber = "";
	
		if(isset($_POST["submitButton"])){
			processForm();
			displayForm();
		}else{
			displayForm();
		}
	
		
		
		function displayForm(){
		
		    global $firstName,$lastName,$email,$mobileNumber;?>
			
			<div class = "container">
			
			<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
				<label for = "firstName">First Name:</label>
				<input type = "text" id = "firstName" name = "firstName">
				<?php echo $firstName;?>
				<br>
				
				<label for = "lastName">Last Name:</label>
				<input type = "text" id = "lastName" name = "lastName">
				<?php echo $lastName; ?>
				<br>
				
				<label for = "email">Email:</label>
				<input type = "text" id = "email" name = "email">
				<?php echo $email; ?>
				<br>
				
				<label for = "mobileNumber">Mobile Number:</label>
				<input type = "text" id = "mobileNumber" name = "mobileNumber">
				<?php echo $mobileNumber;?>
				<br>
				
				<input type = "submit" value = "submit" name = "submitButton">
				<input type = "reset" value = "reset" name = "resetButton">
				
			</form>
		</div>
		<?php	
		}
		
		function processForm(){
			if(empty($_POST["firstName"])){
				global $firstName;
				
			  	$firstName = "First Name is Required";
			}else{
				$firstName = test_input($_POST["firstName"]);
			}
			if(empty($_POST["lastName"])){
					global $lastName;
					$lastName = "Last Name is Required";
			}
			if(empty($_POST["email"])){
				global $email;
			   	$email = "Email is Required";
			}
			
			if(empty($_POST["mobileNumber"])){
				global $mobileNumber;
			   	$mobileNumber = "Mobile Number is required";
			}
		}
		
		function test_input($test){
			return htmlspecialchars($test);
		}
		
		?>
</body>
</html>