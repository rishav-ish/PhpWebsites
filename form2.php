<?php 
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
					
					<input type = "singerName" id = "singerName" name = "singerName" class = "modify" value = "<?php setValue("singerName");?>">
					
					
					<label for = "actressName">Favorite Actress</label>
					<span class = "loud"><?php validateError("actressName",$raised);?></span>
					<input type = "text" id = "actressName" name = "actressName" class = "modify" value = "<?php setValue("actressName")?>">
					
					<label for = "actorName">Favorite Actor</label>
					<span class = "loud"><?php validateError("actorName",$raised);?></span>
					<input type = "text" id = "actorName" name = "actorName" class = "modify" value = "<?php setValue("actorName")?>">
					
					
					
					<label for = "favoriteSong">Favorite Song</label>
					<span class = "loud"><?php validateError("favoriteSong",$raised);?></span>
					<input type = "text" value = "<?php setValue("favoriteSong")?>" name = "favoriteSong" class = "modify"  id = "favoriteSong">
					
					<label for = "favoriteMovie">Favorite Movie</label>
					<span class = "loud"><?php validateError("favoriteMovie",$raised);?></span>
					<input type = "text" value = "<?php setValue("favoriteMovie");?>" name= "favoriteMovie" class = "modify"  id = "favoriteMovie">
					
					<label for = "TVshow">Favorite TV show</label>
					<span class = "loud"><?php validateError("TVshow",$raised);?></span>
					<input type = "text" value = "<?php setValue("TVshow"); ?>" name = "TVshow" id = "TVshow" class = "modify">
					<br>
					<!--<input type = "submit" name = "submitButton" value = "&lt prev" class = "button" id = "prevButton">-->
					<input type = "reset" name = "resetButton" value = "reset" class = "button" id = "resetButton">
					
					<input type = "submit" name = "submitButton" value = "next &gt" class = "button" id = "nextButton" style = "float:right;clear:both;">
				</form>
			</div>
			<?php
		}
		