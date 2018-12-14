<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Name</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
</head>

<body>
	<?php
	
		echo "<h2>".$_SESSION["name"]."</h2>";
	?>
</body>
</html>