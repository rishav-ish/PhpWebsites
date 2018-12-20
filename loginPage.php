<?php
	
	session_start();
	
	define("USERNAME","john");
	define("PASSWORD","secret");
	
	if(isset($_POST["login"])){
		login();
	}else if(isset($_GET["action"]) and $_GET["action"] == "logout"){
		logout();
	}else if(isset($_SESSIOIN["username"])){
		displayPage();
	}else{
		displayLoginForm();
	}
	
	function login(){
		if(isset($_POST["username"]) and isset($_POST["password"])){
			if($_POST["username"]==USERNAME and $_POST["password"]==PASSWORD){
				$_SESSIOIN["username"] = USERNAME;
				session_write_close();
				header("Location:login.php");
			}else{
				displayLoginForm("Sorry, that username/password could not be found.please try again");
			}
		}
	}
	
	
	function logout(){
		unset($_SESSION["username"]);
		session_write_close();
		header("Location:login.php");
	}
	
	function displayPage(){
		displayPageHeader();
	
	?>
	
	<p>Welcome, <strong><?php echo $_SESSIOIN["username"] ?></strong>! You are currently logged in.</p>
	<p><a href="login.php?action=logout">Logout</a></p>
</body>
</html>
<?php
	}
	
	function displayLoginForm($message=""){
		displayPageHeader();
	
	?>
	
	<?php if($message) echo '<p class = "error">'.$message."</p>" ?>
	
	<form action = "login.php" method = "post">
		<div style = "width:30em;">
			<label for = "username">Username</label>
			<input type = "text" name = "username" id = "username" value = ""/>
			<label for = "password">Password</label>
			<input type = "password" name = "password" id = "password" value = "">
			
			<div style = "clear:both;">
				<input type = "submit" name = "login" value = "Login"/>
			</div>
		</div>
	</form>
	
	</body>
	</html>
	<?php
	}
	
	
	function displayPageHeader(){
		?>
		
		<!DOCTYPE html>
		<html>
		<head>
			<title>Login Page</title>
			<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
			<style>
				.error{
					background:#d33;
					color:white;
					padding:0.2em;
				}
			</style>
		</head>
		
		<body>
			<h1>A login/logout system</h1>
		
		<?php
	}
	?>