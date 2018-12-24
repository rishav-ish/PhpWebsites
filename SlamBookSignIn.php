<?php

	//the substring and slice works the same the difference is that substring don't take negative arguments.
	
	session_start();
	include "DataBaseConnect.php";
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
	<link type = "text/css" rel = "stylesheet" href = "SlamBookLogin.css">
	<style>
		.container{
			max-width:50%;
		}
		
		label{
			display:inline-block;
			margin-left:5%;
		}
		
		.modify{
			margin-left:5%;
		}
		
		p{
  font-size: 20px;
  margin-top: 0px;
  padding-left: 2%;
}
		
		@media screen and (max-width:600px){
			.container{
				max-width:100%;
			}
			
			label{
				display:inline-block;
				margin-left:none;
			}
			
			.modify{
				margin-left:none;
			}
		}
	</style>
</head>

<body>




<?php function displaySignIn($missingFields,$raised,$message){
				
			?>
			
			<div class = "container">
				<h2>Login</h2>
				
				<?php
					if($message){
						echo '<p style = "background-color:red; color:white;">User already exists.</p>';
					}else if($missingFields){
						echo "<p>Please Fill all the fields</p>";
					}
					else
						echo "<p>Fill the form</p>";
					
				?>
				
				<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<label for = "firstname">First Name:</label>
					<span class = "error"><?php checkError("firstname",$raised);?></span>
					<input type = "text" id = "firstname" name = "firstname" value = "<?php setValue("firstname"); ?>" class = "modify">
					
					
					<label for = "lastname">Last Name:</label>
					<span class = "error"><?php checkError("lastname",$raised);?></span>
					<input type = "text" id = "lastname" name = "lastname" value = "<?php setValue("lastname"); ?>" class = "modify">
					
					<label for = "username">User Name:</label>
					<span class = "error"><?php checkError("username",$raised);?></span>
					<input type = "text" id = "username" name = "username" value = "<?php setValue("username"); ?>" class = "modify">
					
					<label for = "email">Email:</label>
					<span class = "error"><?php checkError("email",$raised);?></span>
					<input type = "email" id = "email" name = "email" value = "<?php setValue("email"); ?>" class = "modify">
					
					<label for = "mobileNumber">Mobile Number:</label>
					<span class = "error"><?php checkError("mobilenumber",$raised);?></span>
					<input type = "text" id = "mobileNumber" name = "mobilenumber" value = "<?php setValue("mobilenumber"); ?>" class = "modify">
				
					
					<label for = "password">Password:</label>
					<span class="error"><?php checkError("password",$raised);?></span>
					<input type = "password" id = "password" name = "password" class = "modify">
					
					<label for = "passwordcopy">Confirm Password:</label>
					<input type = "password" id = "passwordcopy" name = "passwordcopy" class = "modify">
					
					<input type = "submit" name = "signin" value = "signUp" class = "button">
					<input type = "submit" name = "login" value = "LogIn"  class = "button">

				</form>
			</div>
<?php } 
		
		if($_SERVER["REQUEST_METHOD"]=="POST" and isset($_POST["signin"])){
			
			processForm();
			
		}else if($_SERVER["REQUEST_METHOD"]=="POST" and isset($_POST["login"])){
			header("Location:SlamBookLogin.php");
		}else{
			displaySignIn();
		}
		
		function processForm(){
			$requiredFields = array("firstname","lastname","email","mobilenumber","password","passwordcopy");
			
			$raised = array();
			
			$missingFields = array();
			
			foreach($requiredFields as $requiredField){
				if(!isset($_POST[$requiredField]) or !$_POST[$requiredField]){
					$missingFields[] = $requiredField;
				}
					
				
			}
			
						if(!empty($_POST["firstname"])){
							if(!preg_match("/^[a-zA-Z ]{1,}$/",$_POST["firstname"])){
								$raised[] = "firstname";
							}
						}
					 
			
						if(!empty($_POST["lastname"])){
							if(!preg_match("/^[a-zA-Z, ]{1,}$/",$_POST["lastname"])){
								$raised[] = "lastname";
							}	
						}
			
						if(!empty($_POST["email"])){
							if(!preg_match("/[a-zA-Z0-9.-_]+@[a-zA-Z]+\.+[a-z]{2,5}$/",$_POST["email"])){
								$raised[] = "email";
							}
						}
			
						if(!empty($_POST["mobilenumber"])){
							if(!preg_match("/^[0-9]{10}$/",$_POST["mobilenumber"])){
								$raised[] = "mobilenumber";
							}
						}
						
						
						if(!empty($_POST["password"])){
							$test = $_POST["password"];
							$test2 = $_POST["passwordcopy"];
							if(!preg_match("/$test/",$test2)){
								$raised[] = "password";
							}
						}
			
			if($missingFields or $raised){
				displaySignIn($missingFields,$raised);
			}else{
				$firstname = $_POST["firstname"];
				$lastname = $_POST["lastname"];
				$username = $_POST["username"];
				$email = $_POST["email"];
				$mobilenumber = $_POST["mobilenumber"];
				$password = $_POST["password"];
				
				global $conn;
				
				$sql = "INSERT INTO login VALUES ('$firstname','$lastname','$username','$email','$password','$mobilenumber')";
				
				$test = "SELECT username FROM login WHERE username='$username'";
				
				$result = $conn->query($test);
				
				if($result->num_rows == 1){
					displaySignIn(NULL,NULL,"User already exists");
					$conn->close();
				}else{
					$conn->query($sql);
					$conn->close();
					$_SESSION["username"] = $_POST["username"];
					//session_write_close();
					header("Location:StringOperation.php");
				}
				//$conn->close();
				
				//displayWelcome();
			}
		}
		
		/*function displayWelcome(){
			echo "<h2>Welcome ".$_POST["username"]." How are you...!</h2>";
		}*/
		
		function test_input($test){
			return htmlspecialchars($test);
		}
		
		function setValue($field){
			if(!empty($_POST[$field])){
				echo test_input($_POST[$field]);
			}
			
		}
		
		function checkError($field,$raised){
			if(in_array($field,$raised)){
				echo produceError($field);
			}
		}
		
		function produceError($field){
			
			switch($field){
				
				case "firstname":
					return "Not look like a name";
					
				case "lastname":
					return "Not look like a last name";
					
				case "email":
					return "Not look like an email";
					
				case "mobileNumber":
					return "Not look like a mobileNumber";
					
				case "password":
					return "Password doesn't match";
				
			}
			
		}
		
		$conn->close();
?>

</body>
</html>