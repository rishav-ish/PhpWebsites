<?php

   if(!empty($_POST["invisible"]))
		$_SESSION["invisible"] = test_input($_POST["invisible"]);
	
	if(!empty($_POST["spendingTheDay"]))
		$_SESSION["spendingTheDay"] = test_input($_POST["spendingTheDay"]);
	
	if(!empty($_POST["myFriendsFly"]))
		$_SESSION["myFriendsFly"] = test_input($_POST["myFriendsFly"]);
	
	if(!empty($_POST["giftsMyFriendLike"]))
		$_SESSION["giftsMyFriendLike"] = test_input($_POST["giftsMyFriendLike"]);
	
	if(!empty($_POST["friendFantasy"]))
		$_SESSION["friendFantasy"] = test_input($_POST["friendFantasy"]);
	
	
   
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
					
					<textarea name = "invisible" id = "invisible"><?php echo  $_SESSION["invisible"]; ?>
					
					</textarea>
					 
					
					
					<label for = "spendingTheDay">Your Favorite way of spending the day:</label>
					<span class = "loud"><?php validateError("spendingTheDay",$raised);?></span>
					
                    <textarea name = "spendingTheDay" id = "spendingTheDay"><?php echo $_SESSION["spendingTheDay"]; ?>
					
					</textarea>
					
					<label for = "myFriendsFly">If you could Fly, You would</label>
					<span class = "loud"><?php validateError("myFriendsFly",$raised);?></span>
					
					<textarea name = "myFriendsFly" id = "myFriendsFly"><?php echo $_SESSION["myFriendsFly"]; ?>
					
					</textarea>
					
					<label for = "giftsMyFriendLike">Best Gift you've been given </label>
					<span class = "loud"><?php validateError("giftsMyFriendLike",$raised);?></span>
					
					<textarea name = "giftsMyFriendLike" id = "giftsMyFriendLike"><?php echo $_SESSION["giftsMyFriendLike"]; ?>
					
					
					</textarea>
					
					
					<label for = "friendFantasy">You want to become</label>
					<span class = "loud"><?php validateError("friendFantasy",$raised)?></span>
					<input type = "text" value = "<?php echo $_SESSION["friendFantasy"]; ?>" name = "friendFantasy" class = "modify remove"  id = "friendFantasy">
					
					
					<br>
					<input type = "submit" name = "submitButton" value = "&lt; prev" class = "button" id = "submitButton">
					<input type = "button" name = "resetButton" value = "reset" class = "button" id = "resetButton">
					
					<input type = "submit" name = "submitButton" value = "next &gt;" class = "button" id = "submitButton" style = "float:right;clear:both;">
				</form>
			</div>
		<?php			
		}
		
		?>