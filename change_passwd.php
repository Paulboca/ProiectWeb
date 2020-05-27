<?php
error_reporting(0);
session_start();
$_SESSION['email'] = $_POST['email'];
$_SESSION['pswd'] = $_POST['pswd'];
$_SESSION['cpswd'] = $_POST['cpswd'];
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="img/logo.png" type="image/ico"> <!-- favicon -->
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
	<link href="style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link href="style_changePasswd.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	
    <meta charset="utf-8">
    <title>Change Password</title>
</head>
<body>
    <!-- menu bar -->
		<?php
		include ('menu.php')
		?>
	<form method="POST">
		<div class="textbox">
			<div class="changePasswd">
				<p id="change_passwd_logo1">Change</p>
			</div>
			<div class="changePasswd">
				<p id="change_passwd_logo2">Password</p>
			</div> <br>
			
			<div class="changePasswd">
				<input type="email" id="email" name="email" 
					maxlength="100" placeholder="Email"
					value="<?= $_SESSION['email'];?>" required>
			</div>

			<div class="changePasswd">
				<input type="password" id="password" name="pswd" 
					placeholder="New Password" maxlength="100"
					value="<?= $_SESSION['pswd'];?>" required>        
			</div>

			<div class="changePasswd">
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

				<?php
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$email = $_POST['email'];
						$passwd = $_POST['pswd'];
						$cpasswd = $_POST['cpswd'];
						
						$link = mysqli_connect("localhost", "root", "", "fes");
						
						if($link === false){
							die("ERROR: Could not connect. " . mysqli_connect_error());
						}
						
						if ( empty($email) || empty($passwd) || empty($cpasswd) ) {
						echo "Complete the entire form";
						}else{
							
							$sql = "SELECT count(email) from users WHERE email = '" . $email . "'";
							$res = mysqli_query($link, $sql);
							$row = mysqli_fetch_row($res);

							if( $row[0] != 1 ){
								echo "This e-mail is not registered";

							}elseif ($passwd != $cpasswd){
									echo "You typed two different passwords";
									
									}else{
										
										$sql = "UPDATE users SET passwd = '" . $passwd . "' WHERE email = '" . $email . "'";

										if(mysqli_query($link, $sql)){
											Header('Location: succes.php');

										} else{
											echo "Error: ". mysqli_error($link);
										}

									}
						}
						mysqli_close($link);
					}
				?>
			</div>
		</div>
	</form>
</body>
</html>