<?php
	include "DataBaseConnect.php";
	
	//session_start();
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
	<link type = "text/css" rel = "stylesheet" href = "SlamBookLogin.css">
	<style>
		p{
  margin: 0px;
  padding: 5px;
  font-family: arial;
  border-bottom: 1px solid black;
}
	</style>
</head>

<body>
	
	<?php
		
		function displayLoginPage($message){
			
			?>
			
			<div class = "container">
				<h2>Login</h2>
				
				<?php
				
				if($message){
					echo '<p style="background-color:red;color: white;font-weight: bold;">'.$message."</p>";
				}else
					echo "<p>Enter your details.</p>"
				?>
				
				<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<label for = "userName">UserName</label>
					<input type = "text" id = "userName" name = "username" value = "" class = "modify">
					
					<label for = "password">Password</label>
					<input type = "password" id = "password" name = "password" class = "modify">
					
					<input type = "submit" name = "Login" value = "Login" class = "button">
					
					<input type = "submit" name = "signin" value = "signIn" class = "button">

				</form>
			</div>
		<?php } ?>
		
		<?php	
			
			if($_SERVER["REQUEST_METHOD"]=="POST" and isset($_POST["Login"])){
				$username = $_POST["username"];
				$password = $_POST["password"];
				
				$sql = "SELECT username,password FROM login WHERE username='$username' and password='$password'";
				
				$result = $conn->query($sql);
				
				$conn->close();
				
				if($result->num_rows == 1){
					login();
				}else{
					displayLoginPage("Wrong userid or password");
				}
				
			}else if($_SERVER["REQUEST_METHOD"]=="POST" and isset($_POST["signin"])){
				header("Location:SlamBookSignIn.php");
			}
			else{
				displayLoginPage();
			}
			
			
			function login(){
				echo "<h2>Welcome ".$_POST["username"]." How are you</h2>";
			}
			
			
			
			
		?>
</body>
</html>
			
		