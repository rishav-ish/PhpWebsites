<?php

  function displayForm(){?>


<!DOCTYPE html>
<html>
<html>
<head>
	<title>preg_match</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "preg_match.css">
</head>

<body>
	<h1>Hightlight particular text</h1>
	
	<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
		<textarea name = "text" value = "">
			
		</textarea>
		
		<input type = "text" id = "highlight" name = "word" placeholder = "Word to highlight" required>
		<input type = "submit" value = "Highlight">
		<input type = "reset" value = "clear">
	</form>
</body>
</html>

  <?php } 
  
  function displayHighlight($text){?>


<!DOCTYPE html>
<html>
<html>
<head>
	<title>preg_match</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "preg_match.css">
</head>

<body>
	<h1>Hightlight particular text</h1>
	
	<!--<form action = "" method = "post">-->
		<div name = "text" id = "container">
			<?php echo "$text";?>
		</div>
		
		<!--<input type = "text" id = "highlight" name = "word" placeholder = "Word to highlight" required>-->
		<!--<input type = "submit" value = "Highlight">-->
		<!--<input type = "reset" value = "clear">-->
	<!--</form>-->
	
	<!--<a href = "http://localhost:8181/regularExpression/HighlightWord.php">Go Back</a>-->
	
	<?php	
		
		$link = $_SERVER["SCRIPT_URI"];
		
		echo "<a href = ".$link.">Go Back</a>";
	?>
</body>
</html> 
	
  <?php }
  
  if(isset($_POST["text"])){
	
	$word = test_input($_POST["word"]);
	
	$text = test_input($_POST["text"]);
	
	
	
	$new = preg_replace("/$word/",'<span style="background-color:yellow">'."$word</span>",$text);
	
	displayHighlight($new);

  }else{
	  displayForm();
  }
  
  function test_input($text){
	  return htmlspecialchars($text);
  }
  
  
?>