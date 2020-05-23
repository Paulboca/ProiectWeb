<?php
error_reporting(0);
session_start();
$_SESSION['fName'] = $_POST['fName'];
$_SESSION['lName'] = $_POST['lName'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['pswd'] = $_POST['pswd'];
$_SESSION['cpswd'] = $_POST['cpswd'];
?>
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

	<form method="POST">
		<div class="textbox">
			<div class="signUp">
				<p id="register_logo">Register</p>
			</div> <br>
			
			<div class="signUp">
				<input type="text" id="fname" name="fName" 
					maxlength="100" placeholder="First Name" 
						value="<?= $_SESSION['fName'];?>" required>
			</div>
			
			<div class="signUp">
				<input type="text" id="lname" name="lName" 
					maxlength="100" placeholder="Last Name"
					value="<?= $_SESSION['lName'];?>" required>
			</div>
			
			<div class="signUp">
				<input type="email" id="email" name="email" 
					maxlength="100" placeholder="Email"
					value="<?= $_SESSION['email'];?>" required>
			</div>

			<div class="signUp">
				<input type="password" id="password" name="pswd" 
					placeholder="Password" maxlength="100"
					value="<?= $_SESSION['pswd'];?>" required>
			</div>

			<div class="signUp">
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
			
				<?php
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$fname = $_POST['fName'];
						$lname = $_POST['lName'];
						$email = $_POST['email'];
						$passwd = $_POST['pswd'];
						$cpasswd = $_POST['cpswd'];
						
						$link = mysqli_connect("localhost", "root", "", "fes");

						if($link === false){
							die("ERROR: Could not connect. " . mysqli_connect_error());
						}

						if ( empty($fname) || empty($lname) || empty($email) || empty($passwd) || empty($cpasswd) ) {
						echo "Complete the entire form";

						} elseif ($passwd != $cpasswd){
							echo "You typed two different passwords";
							
							}else{
								$sql = "INSERT INTO users (fName, lName, email, passwd) VALUES ('$fname', '$lname', '$email', '$passwd')";

								if(mysqli_query($link, $sql)){
									Header('Location: succes.php');
									
								} else{
									echo "This e-mail is registred already";//. mysqli_error($link);
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