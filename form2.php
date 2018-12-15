<?php 
	if(!empty($_POST["singerName"]))
		$_SESSION["singerName"] = test_input($_POST["singerName"]);
	
	if(!empty($_POST["actressName"]))
		$_SESSION["actressName"] = test_input($_POST["actressName"]);
	
	if(!empty($_POST["actorName"]))
		$_SESSION["actorName"] = test_input($_POST["actorName"]);
	
	if(!empty($_POST["favoriteSong"]))
		$_SESSION["favoriteSong"] = test_input($_POST["favoriteSong"]);
	
	if(!empty($_POST["favoriteMovie"]))
		$_SESSION["favoriteMovie"] = test_input($_POST["favoriteMovie"]);
	
	if(!empty($_POST["TVshow"]))
		$_SESSION["TVshow"] = test_input($_POST["TVshow"]);
	
	


function displayForm2($raised){
			?>
		<div class = "container">
				<h2>Slam Book</h2>
				
				<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				
				<?php if($missingFields){
					echo '<p>Please fill the field marked with asterisk *</p>';
				}else{
					echo "<p>Let me know what you like...</p>";
				}
				?>
				
					<input type = "hidden" name = "state" value = "2"> 
				
					
					<label for = "singerName">Favorite Singer</label>
					<span class = "loud"><?php validateError("singerName",$raised);?></span>
					
					<input type = "singerName" id = "singerName" name = "singerName" class = "modify remove" value = "<?php echo $_SESSION["singerName"]; ?>">
				
					
					<label for = "actressName">Favorite Actress</label>
					<span class = "loud"><?php validateError("actressName",$raised);?></span>
					<input type = "text" id = "actressName" name = "actressName" class = "modify remove" value = "<?php echo $_SESSION["actressName"]; ?>">
					
					<label for = "actorName">Favorite Actor</label>
					<span class = "loud"><?php validateError("actorName",$raised);?></span>
					<input type = "text" id = "actorName" name = "actorName" class = "modify remove" value = "<?php echo $_SESSION["actorName"]; ?>">
					
					
					
					<label for = "favoriteSong">Favorite Song</label>
					<span class = "loud"><?php validateError("favoriteSong",$raised);?></span>
					<input type = "text" value = "<?php echo $_SESSION["favoriteSong"]; ?>" name = "favoriteSong" class = "modify remove"  id = "favoriteSong">
					
					<label for = "favoriteMovie">Favorite Movie</label>
					<span class = "loud"><?php validateError("favoriteMovie",$raised);?></span>
					<input type = "text" value = "<?php echo $_SESSION["favoriteMovie"]; ?>" name= "favoriteMovie" class = "modify remove"  id = "favoriteMovie">
					
					<label for = "TVshow">Favorite TV show</label>
					<span class = "loud"><?php validateError("TVshow",$raised);?></span>
					<input type = "text" value = "<?php echo $_SESSION["TVshow"]; ?>" name = "TVshow" id = "TVshow" class = "modify remove">
					<br>
					<input type = "submit" name = "submitButton" value = "&lt prev" class = "button" id = "prevButton">
					<input type = "button" name = "resetButton" value = "reset" class = "button" id = "resetButton">
					
					<input type = "submit" name = "submitButton" value = "next &gt" class = "button" id = "nextButton" style = "float:right;clear:both;">
				</form>
			</div>
			<?php
		}
		