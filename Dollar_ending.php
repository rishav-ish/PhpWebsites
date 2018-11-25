<!DOCTYPE html>
<html>
<head>
	<title>$ ending</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
</head>

<body>
	
	<?php
		
		$text = "rishavkumar446@gmail.com";
		
		if(preg_match("/.com$/",$text)){
			echo "<h1>Yup the $text contains .com</h1>";
		}else{
			echo "<h1>No the $text does not contains .com</h1>";
		}
		
		if(preg_match("/./",$text)){
			echo "<h1>It also contains single character.</h1>";
		}else{
			echo "<h1>It does not contain single characters</h1>";
		}
		
		if(preg_match("/[]/",$text)){
			echo "<h1>Yippee</h1>";
		}else{
			echo "<h1>Oh shit</h1>";
		}
	?>
</body>
</html>