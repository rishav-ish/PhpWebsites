<!DOCTYPE html>
<html>
<head>
	<title>File Handling</title>
	<meta name = "viewport" content="width=device-width,initial-scale=1.0">
	<style>
		div{
  border: 1px solid black;
  margin: 10px;
  padding: 20px;
  font-size: 20px;
  border-radius: 8px;
  box-shadow: 0px 0px 3px black;
  background-color: 
}
	</style>
</head>

<body>
<?php
	
	$color = array("violet","indigo","blue","green","yellow","orange","red");
	
	$myfile = fopen("Faltu.txt","r");
	
	
	
	while(!feof($myfile)){
		$text = fgets($myfile);
		
		echo preg_match("/[a-zA-Z]/",$text) ? "<div> ":"<br>";
		
		echo '<span style="color:'.$color[rand(0,6)].'">'.$text.'</span>';
		
		echo preg_match("/[a-zA-Z]/",$text) ? "</div> ":"<br>";
	}
	
	
	
	fclose($myfile);
?>
</body>
</html>
	
	