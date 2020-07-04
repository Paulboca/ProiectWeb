<?php
// error_reporting(0);
session_start();

if (isset($_COOKIE['user_fName']) && !empty($_COOKIE['user_fName'])) {
    Header('Location: account.php');
}

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $_SESSION['email'] = $_POST['email'];
} else {
    $_SESSION['email'] = "";
}

if (isset($_POST['pswd']) && !empty($_POST['pswd'])) {
    $_SESSION['pswd'] = $_POST['pswd'];
} else {
    $_SESSION['pswd'] = "";
}

if (isset($_POST['cpswd']) && !empty($_POST['cpswd'])) {
    $_SESSION['cpswd'] = $_POST['cpswd'];
} else {
    $_SESSION['cpswd'] = "";
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta name="Description" content="The change password page for the FES site.">
	<meta name="viewport" content="width=device-width">
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
	<link href="styles/style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link href="styles/style_changePasswd.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	
    <meta charset="utf-8">
    <title>Fashion E-Shop</title>
</head>
<body>
    <!-- menu bar -->
		<?php
		include ('menu.php')
		?>
	<form method="POST">
	    <div class="topline">
			<div class="textbox">
				<div class="changePasswd">
					<p class="change_passwd_logo1">Change</p>
				</div>
				<div class="changePasswd">
					<p class="change_passwd_logo2">Password</p>
				</div> <br>
				
				<div class="changePasswd">
					<label class="ll" for="email">E-mail</label>
					<input type="email" id="email" name="email" 
						maxlength="100" placeholder="Email"
						value="<?= $_SESSION['email'];?>" required>
				</div>

				<div class="changePasswd">
					<label class="ll" for="password">Password</label>
					<input type="password" id="password" name="pswd" 
						placeholder="New Password" maxlength="100"
						value="<?= $_SESSION['pswd'];?>" required>        
				</div>

				<div class="changePasswd">
                    <label class="ll" for="cpassword">Confirm Password</label>
					<input type="password" id="cpassword" name="cpswd" 
						placeholder="Confirm Password" maxlength="100"
						value="<?= $_SESSION['cpswd'];?>" required>        
				</div>

				<div class="changePasswd">
					<button  id="continue">CONTINUE</button>
				</div>
				
				<div class="changePasswd">
					<a class="changePasswd" id="login" href="login.php">LOGIN</a>
					<a class="changePasswd" id="sign_up" href="sign_up.php">SIGN UP</a>
				</div>
				
                <div class="php">
					<?php include ('php_scripts/script_change_passwd.php'); ?>
                </div>
			</div>
	    </div>
	</form>
</body>
</html>