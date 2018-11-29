<?php

function displayForm3(){
			?>
			<div class = "container">
			<h2>Slam Book</h2>
				
				
				<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				
				<?php if($missingFields){
					echo '<p>Please fill the field marked with asterisk *</p>';
				}else{
					echo "<p>Enter your data ...</p>";
				}
				?>
				
					<input type = "hidden" name = "state" value = "3">
				
					<label for = "invisible">If you could be Invisible you would:</label>
					<span class = "loud"><?php validateError("invisible",$raised);?></span>
					
					<textarea name = "invisible" id = "invisible">
					
					</textarea>
					
					<label for = "spendingTheDay">Your Favorite way of spending the day:</label>
					<span class = "loud"><?php validateError("spendingTheDay",$raised);?></span>
					
					<textarea name = "spendingTheDay" id = "spendingTheDay">
					
					</textarea>
					
					<label for = "myFriendsFly">If you could Fly, You would</label>
					<span class = "loud"><?php validateError("myFriendsFly",$raised);?></span>
					
					<textarea name = "myFriendsFly" id = "myFriendsFly">
					
					</textarea>
					
					<label for = "giftsMyFriendLike">Best Gift you've been given</label>
					<span class = "loud"><?php validateError("giftsMyFriendLike",$raised);?></span>
					
					<textarea name = "giftsMyFriendLike" id = "giftsMyFriendLike">
					
					
					</textarea>
					
					
					<label for = "friendFantasy">You want to become</label>
					<span class = "loud"><?php validateError("friendFantasy",$raised)?></span>
					<input type = "text" value = "<?php setValue("favoriteSong")?>" name = "friendFantasy[]" class = "modify"  id = "friendFantasy">
					
					<label for = "favoriteMovie">Favorite Movie</label>
					<input type = "text" value = "<?php setValue("favoriteMovie");?>" name= "favoriteMovie" class = "modify"  id = "favoriteMovie">
					
					<label for = "TVshow">Favorite TV show</label>
					<input type = "text" value = "<?php setValue("TVshow"); ?>" name = "TVshow" id = "TVshow" class = "modify">
					<br>
					<input type = "submit" name = "submitButton" value = "&lt; prev" class = "button" id = "submitButton">
					<input type = "reset" name = "resetButton" value = "reset" class = "button" id = "resetButton">
					
					<input type = "submit" name = "submitButton" value = "next &gt;" class = "button" id = "submitButton" style = "float:right;clear:both;">
				</form>
			</div>
		<?php			
		}
		
		?>