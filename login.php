<!doctype html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="style_menu.css" rel="stylesheet">
    <link href="style_login.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
		<?php
		include ('menu.php')
		?>
    <div class="textbox">
        <div class="login">
            <p id="login_logo">Login</p>
        </div>
        
        <div class="login"> <br/>
            <input type="email" id="email" name="email" 
                maxlength="100" placeholder="Email">
        </div>

        <div class="login"> <br/>
            <input type="password" id="password" name="pswd" 
                placeholder="Password" maxlength="100">        
        </div>

        <div class="login">
            <button  id="login_to_account">LOGIN TO ACCOUNT</button>
            <p class="login" id="forgot_password">Forgot password?
                 <a href="change_passwd.php">Click here</a></p>
        </div>

        <div class="login">
            <a class="login" id="sign_up" href="sign_up.php">SIGN UP</a>
        </div>
    </div>
</body>
</html>