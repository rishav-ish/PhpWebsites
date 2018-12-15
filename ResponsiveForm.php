<!--one page slam book form -->
<?php
    session_start();
	
	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Slam Book</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
	<link rel = "stylesheet" type = "text/css" href = "ResponsiveForm.css">
	<style>
		.error{
			color:red;
		}
	</style>
</head>

<body>
	<?php
		require_once("form1.php");
		require_once("form2.php");
		require_once("form3.php");
		
	
	    function sayThanks(){
			?>
			
			<div class = "sayThanks">
				Hello <span style = "color:red"><?php echo $_SESSION["firstName"];?></span>, you have completed your login, your credential information
				will be send to your mail shortly
			</div>
			
		<?php }
		
		
		function test_input($test){
			return htmlspecialchars($test);
		}
		
		
		
		function setValue($fieldName){
			if(!empty($_POST[$fieldName])){
				$fieldValue = test_input($_POST[$fieldName]) ;
				
				return $fieldValue;
			}
		}
		
		function setChecked($fieldName,$fieldValue){
			if(isset($_POST[$fieldName]) and $_POST[$fieldName]==$fieldValue){
				return 'checked = "checked"';
			}
		}
		
		function validateField($fieldName,$missingFields){
			if(in_array($fieldName,$missingFields)){
				echo ' class = "error"';
			}
		}
		
		
		
		
		function validateError($fieldName,$raised){
				if(in_array($fieldName,$raised)){
					echo produceError($fieldName);
				}
			}
			
		function produceError($fieldName){
			
			switch($fieldName){
				case "firstName":
					return "Not look like a name";
					
				/*case "nickName":
					return "Not look like a nick name";*/
					
				case "email":
					return "Not a valid email Id";
					
				case "mobileNumber":
					return "Not a valid mobileNumber";
					
				case "nickName":
					return "Not look like a nick name";
					
			}	
			
		}
		
		
		
		
		if($_SERVER["REQUEST_METHOD"]=="POST" and $_POST["state"]>=1 and $_POST["state"]<=3 ){	
			call_user_func("processStep".(int)$_POST["state"]);
			
		}else{
			displayForm1();
		}
		
		
		//step by step form switch chode....
		
		
		
		function processStep1(){
			
			if(isset($_POST["submitButton"]) and $_POST["submitButton"]=="next >"){
				processForm1();
			}
		}
		
		function processStep2(){
			if(isset($_POST["submitButton"]) and $_POST["submitButton"]=="next >"){
				displayForm3();
			}else
				displayForm1($missingFields,$raised);
		}
		
		function processStep3(){
			if(isset($_POST["submitButton"]) and $_POST["submitButton"] == "next >"){
			    sayThanks();
				session_unset();
				session_destroy();
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
		document.getElementById("resetButton").addEventListener("click",function(){var el = document.getElementsByClassName("remove");var i = 0; for(i=0;el.length;i++){el[i].value = "";} });
	</script>  
	
	
</body>
</html>
