<!doctype html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="style_menu.css" rel="stylesheet">
    <link href="style_signUp.css" rel="stylesheet">
	<title>Sign Up</title>
</head>
<body>
		<?php
		include ('menu.php')
		?>
	<div class="textbox">
        <div class="signUp">
            <p id="register_logo">Register</p>
		</div> <br>
		
		<div class="signUp">
        	<input type="text" id="fname" name="fName" 
            	maxlength="100" placeholder="First Name">
		</div>
		
		<div class="signUp">
        	<input type="text" id="lname" name="lName" 
            	maxlength="100" placeholder="Last Name">
        </div>
		
		<div class="signUp">
        	<input type="email" id="email" name="email" 
            	maxlength="100" placeholder="Email">
        </div>

        <div class="signUp">
        	<input type="password" id="password" name="pswd" 
            	placeholder="Password" maxlength="100">        
		</div>

		<div class="signUp">
        	<input type="password" id="cpassword" name="cpswd" 
            	placeholder="Confirm Password" maxlength="100">        
        </div>

        <div class="signUp">
            <button  id="create_account">CREATE ACCOUNT</button>
		</div>
		
        <div class="signUp">
            <a class="signUp" id="login" href="login.php">LOGIN</a>
        </div>
    </div>
</body>
</html>