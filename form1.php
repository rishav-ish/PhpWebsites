<?php

    if(!empty($_POST["firstName"]))
		$_SESSION["firstName"] = test_input($_POST["firstName"]);
	
	if(!empty($_POST["nickName"]))
		$_SESSION["nickName"] = test_input($_POST["nickName"]);
	
	if(!empty($_POST["email"]))
		$_SESSION["email"] = test_input($_POST["email"]);
	
	if(!empty($_POST["mobileNumber"]))
		$_SESSION["mobileNumber"] = test_input($_POST["mobileNumber"]);
	
	

function displayForm1($missingFields,$raised){
			?>
			
			
			
			
			<div class = "container">
				<h2>Slam Book</h2>
				
				<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				
					<input type = "hidden" name = "state" value = "1">
					
				<?php if($missingFields){
					echo '<p>Please fill the field marked with asterisk *</p>';
				}else{
					echo "<p>Enter your data</p>";
				}
				?>
				
					<label for = "firstName">Name<span <?php validateField("firstName",$missingFields);?>>*</span></label>
					<span class = "loud"><?php validateError("firstName",$raised);?></span>
					
					<input type = "text" id = "firstName" name = "firstName" class = "modify" value = "<?php echo  $_SESSION["firstName"];?>">
					
					<label for = "nickName">Nick Name<span <?php validateField("nickName",$missingFields);?>>*</span></label>
					<span class = "loud"><?php validateError("nickName",$raised);?></span>
					
					<input type = "text" id = "nickName" name = "nickName" class = "modify" value = "<?php echo $_SESSION["nickName"];?>">
					
					
					<label for = "email">Email<span <?php validateField("email",$missingFields);?>>*</span></label>
					<span class = "loud"><?php validateError("email",$raised);?></span>
					<input type = "text" id = "email" name = "email" class = "modify" value = "<?php echo $_SESSION["email"];?>">
					
					<label for = "mobileNumber">Mobile Number<span <?php validateField("mobileNumber",$missingFields);?>>*</span></label>
					<span class = "loud"><?php validateError("mobileNumber",$raised);?></span>
					<input type = "text" id = "mobileNumber" name = "mobileNumber" class = "modify" value = "<?php echo $_SESSION["mobileNumber"];?>">
					
					
					
					<label for = "male">Male</label>
					<input type = "radio" value = "male" name = "gender" id = "male" <?php echo setChecked("gender","male");?>>
					
					<label for = "female">Female</label>
					<input type = "radio" value = "female" name= "gender" id = "female" <?php echo setChecked("gender","female");?>>
					
					<label for = "special">Special</label>
					<input type = "radio" value = "special" name = "gender" id = "special" <?php echo setChecked("gender","special");?>>
					<br>
					<input type = "submit" name = "submitButton" value = "next &gt;" class = "button" id = "submitButton">
					<input type = "button" name = "resetButton" value = "reset" class = "button" id = "resetButton">
				</form>
			</div>
			<?php
		} 
		
		



function processForm1(){
			$requiredFields = array("firstName","nickName","email","mobileNumber");
			
			$raised = array();
			
			$missingFields = array();
			
			foreach($requiredFields as $requiredField){
				if(!isset($_POST[$requiredField]) or !$_POST[$requiredField]){
					$missingFields[] = $requiredField;
				}
					
				
			}
			
						if(!empty($_POST["firstName"])){
							if(!preg_match("/^[a-zA-Z ]{1,}$/",$_POST["firstName"])){
								$raised[] = "firstName";
							}
						}
					 
			
						if(!empty($_POST["nickName"])){
							if(!preg_match("/^[a-zA-Z, ]{1,}$/",$_POST["nickName"])){
								$raised[] = "nickName";
							}	
						}
			
						if(!empty($_POST["email"])){
							if(!preg_match("/[a-zA-Z0-9.-_]+@[a-zA-Z]+\.+[a-z]{2,5}$/",$_POST["email"])){
								$raised[] = "email";
							}
						}
			
						if(!empty($_POST["mobileNumber"])){
							if(!preg_match("/^[0-9]{10}$/",$_POST["mobileNumber"])){
								$raised[] = "mobileNumber";
							}
						}
							
					
			
			if($missingFields or $raised){
				displayForm1($missingFields,$raised);
			}else{
				displayForm2();
			}
			
		}
		
		
		
?>		


        <script>
		function emptyData(){
			document.getElementById("firstName").value = "";
			document.getElementById("nickName").value = "";
			document.getElementById("email").value = "";
			document.getElementById("mobileNumber").value = "";
			document.getElementById("male").checked = "";
			document.getElementById("female").checked = "";
			document.getElementById("special").checked = "";
		
			
			}
		
		document.getElementById("resetButton").addEventListener("click",emptyData);
		document.getElementById("resetButton").addEventListener("click",function(){ var el = document.getElementsByClassName("loud"); var i; for(i=0;i<el.length;i++){ el[i].style.display = "none"; } });
		document.getElementById("resetButton").addEventListener("click",function(){ var el = document.getElementsByClassName("error"); var i = 0; for(i=0;el.length;i++){ el[i].style.color = "purple"; } });
	</script>