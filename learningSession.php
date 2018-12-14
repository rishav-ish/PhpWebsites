<!DOCTYPE html>
<html>
<head>
	<title>Learning Session</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
</head>

<body>
	<?php
		
		session_start();
		
		$_SESSION["name"] = "Rishav";
		
	?>
</body>
</html>