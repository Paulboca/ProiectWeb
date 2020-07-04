<?php
// error_reporting(0);
session_start();

if (isset($_COOKIE['user_fName']) && !empty($_COOKIE['user_fName'])) {
    Header('Location: account.php');
}

if (isset($_POST['fName']) && !empty($_POST['fName'])) {
    $_SESSION['fName'] = $_POST['fName'];
} else {
    $_SESSION['fName'] = "";
}

if (isset($_POST['lName']) && !empty($_POST['lName'])) {
    $_SESSION['lName'] = $_POST['lName'];
} else {
    $_SESSION['lName'] = "";
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
	<meta name="Description" content="The sign up page for the FES site.">
	<meta name="viewport" content="width=device-width">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
	<link href="styles/style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link href="styles/style_signUp.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	
    <meta charset="utf-8">
	<title>Fashion E-Shop</title>
</head>
<body>
		<?php
		include ('menu.php')
		?>

	<form method="POST">
	    <div class="topline">
			<div class="textbox">
				<div class="signUp">
					<p class="register_logo">Register</p>
				</div> <br>
				
				<div class="signUp">
					<label class="ll" for="fname">First Name</label>
					<input type="text" id="fname" name="fName" 
						maxlength="100" placeholder="First Name" 
							value="<?= $_SESSION['fName'];?>" required>
				</div>
				
				<div class="signUp">
					<label class="ll" for="lname">Last Name</label>
					<input type="text" id="lname" name="lName" 
						maxlength="100" placeholder="Last Name"
						value="<?= $_SESSION['lName'];?>" required>
				</div>
				
				<div class="signUp">
					<label class="ll" for="email">E-mail</label>
					<input type="email" id="email" name="email" 
						maxlength="100" placeholder="Email"
						value="<?= $_SESSION['email'];?>" required>
				</div>

				<div class="signUp">
					<label class="ll" for="password">Password</label>
					<input type="password" id="password" name="pswd" 
						placeholder="Password" maxlength="100"
						value="<?= $_SESSION['pswd'];?>" required>
				</div>

				<div class="signUp">
					<label class="ll" for="cpassword">Confirm Password</label>
					<input type="password" id="cpassword" name="cpswd" 
						placeholder="Confirm Password" maxlength="100"
						value="<?= $_SESSION['cpswd'];?>" required>
				</div>


				<div class="signUp">
					<input type="submit" id="create_account" name="insert" value="CREATE ACCOUNT" />
					<!-- <button  id="create_account">CREATE ACCOUNT</button> -->
				</div>

				<div class="signUp">
					<a class="signUp" id="login" href="login.php">LOGIN</a>
				</div>

                <div class="php">
					<?php include ('php_scripts/script_sign_up.php'); ?>
                </div>
			</div>
	    </div>
	</form>
</body>
</html>