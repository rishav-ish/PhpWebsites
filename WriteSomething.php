<!DOCTYPE html>
<html>
<head>
	<title>Hello user</title>
	<meta name = "viewport" content="width=device-width,initial-scale=1.0">
	<style>
		textarea{
  display: block;
  height: 500px;
  width: 90%;
  margin: 10px auto;
  resize: none;
  padding:0px 5px;
  font-size:20px;
  font-family:cursive;
}

input{
  position: relative;
  display: inline-block;
  font-size: 20px;
  left: 70px;
  margin:5px;
  border-radius: 5px;
  border: 1px solid black;
}
	</style>
</head>


<body>
	
	
	<form action = "createFile.php" method = "post">
		<textarea width="100%" cols = "50" name = "thought">
		
		</textarea>
		<br>
		<input type = "submit" value = "Submit">
		<input type = "reset" value = "reset">
	</form>
	
</body>
</html>