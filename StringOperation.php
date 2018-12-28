<?php 
	session_start();
	
	include "DataBaseConnect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>String operations</title>
	<link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei" rel="stylesheet"> 
	<link rel = "stylesheet" type = "text/css" href = "StringOperation.css">
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
</head>

<body>
	<?php
		
		function displayPage($firstname){
		
		?>		
			
		<h2>String Doctor</h2>
		
		<ul class = "navbar">
			<li class = "active"><a href = "#">Home</a></li>
			<li><a href = "StringOperationProfile.php">Profile</a></li>
			<li><a>Activity</a></li>
			<li><a>File</a></li>
			<li><a href = "StringOperationLogout.php">logout</a></li>
			<?php	
			    if($firstname){
				  echo '<li id = "name">'."Welcome ".$firstname.'</li>';
				}
			?>		
		</ul>
		
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
				
				$username = $_SESSION["username"];
				
				$sql = "SELECT * FROM login WHERE username= '$username'";
				
				$result = $conn->query($sql);
				
				$conn->close();
				
				$row = $result->fetch_assoc();
				
				$firstname = $row['firstname'];
				
				displayPage($firstname);
				
			}else{
				session_unset();
				session_destroy();
				header("Location:SlamBookLogin.php");
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
    	var t =  s + " first appears at the index position " + n;
      document.getElementById("view").textContent = t;
      document.getElementById("view").style.display = "inline-block";
  }else{
		  var t = s + " doesn't exist in text";
      document.getElementById("view").textContent = t;
      document.getElementById("view").style.display = "inline-block";
  }
});

	document.getElementById("clear").addEventListener("click",function(){ document.getElementById("text").value = ""; });
	document.getElementById("replace_all").addEventListener("click",function(){ var el = document.getElementById("text"); var r = prompt("What you want to replace"); var a = prompt("With what you want to replace");  el.value =  el.value.replace(new RegExp(r,'g'),a); });
	document.getElementById("replace_insensitive").addEventListener("click",function(){ var el = document.getElementById("text"); var r = prompt("What you want to replace"); var a = prompt("What you want to replace with"); el.value = el.value.replace(new RegExp(r,'i'),a); });
	document.getElementById("replace_all_insensitive").addEventListener("click",function(){ var el = document.getElementById("text"); var r = prompt("What you want to replace"); var a = prompt("What you want to replace with"); el.value = el.value.replace(new RegExp(r,'gi'),a); });
	document.getElementById("index").addEventListener("click",function(){ var el = document.getElementById("text").value; var find = prompt("Please provide the vaue "); var n = el.indexOf(find); if(n>=0){ document.getElementById("view").textContent = find + " is at position " + n; document.getElementById("view").style.display = "inline-block"; }else{ document.getElementById("view").textContent = find + " doesn't exist in text"; document.getElementById("view").style.display = "inline-block"; } });
	document.getElementById("replace").addEventListener("click",function(){ var el = document.getElementById("text"); var r = prompt("What you want to replace"); var a = prompt("With what you want to replace");  el.value =  el.value.replace(r,a); });

		</script>
	</body>
</html>
			