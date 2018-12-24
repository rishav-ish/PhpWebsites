<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>String operations</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "StringOperation.css">
</head>

<body>
	<?php
		
		function displayPage(){
		
		?>		
			
		<h2>String Doctor</h2>
		
		<form method = "post" action = "<?php htmlspecialchars($_SERVR["PHP_SELF"]); ?>">
			
			<textarea placeholder = "write something here" id = "text">
			
			
			</textarea>
			
			
			
		</form>
		
		<div id = "view" style="display:none">
			
		</div>
		
		
		
		
		
		
		
		
		<div class = "btn">
			<button id = "length">compute length</button>
			<button id = "replace">replace</button>
			<button id = "replace_all">replace all</button>
			<button id = "replace_insensitive">replace insensitive</button>
			<button id = "replace_all_insensitive">replace all insensitive</button>
			<button id = "index">index</button>
			<button id = "search">search</button>
			<button id = "clear">clear</button>
		</div>
	    <?php 
		}?>
		
		<?php
			if(isset($_SESSION["username"])){
				displayPage();
				
			}else{
				session_unset();
				session_destroy();
				header("Location:SlamBookSignIn.php");
				
				//displayPage();
				
				//echo "<h2>".$_SESSION["username"]."</h2>";
			}
		?>
		
		<script>
			document.getElementById("length").addEventListener("click",function(){ var s = document.getElementById("text").value; var n = s.length; n = "Length is " + n; document.getElementById('view').textContent = n; document.getElementById('view').style.display = "inline-block"; });
			document.getElementById("text").addEventListener("focus",function(){ document.getElementById("view").style.display = "none";});
			document.getElementById("search").addEventListener("click",function(){
  var d = document.getElementById("text").value;
  var s = prompt("what you want to search?");
  
  var n = d.search(s);
  
  if(n>=0){
    	var t = s + " first appears at the index position " + n;
      document.getElementById("view").textContent = t;
      document.getElementById("view").style.display = "inline-block";
  }else{
		  var t = s + " doesn't exist in text";
      document.getElementById("view").textContent = t;
      document.getElementById("view").style.display = "inline-block";
  }
});

	document.getElementById("clear").addEventListener("click",function(){ document.getElementById("text").value = ""; });
		
		</script>
	</body>
</html>
			