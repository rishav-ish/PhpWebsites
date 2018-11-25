<!DOCTYPE html>
<html>
<head>
	<title>Time</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
	<style>
	     h1{
  border: 1px solid black;
  text-align: center;
  padding: 50px 0px;
  margin: 5% auto;
  width: 40%;
  box-shadow: 0px 0px 16px black;
  border-radius: 5px;
}

@media screen and (max-width:500px){
  h1{
    min-width: 70%;
    margin-top:45%;
    overflow: scroll;
    font-size: 10vw;
	background-color:yellow;
  }
  
}
	</style>
</head>

<body>
	
	<?php	
	    
		echo "<h1>".date("h:i:sa")."</h1>";
	?>
</body>
</html>