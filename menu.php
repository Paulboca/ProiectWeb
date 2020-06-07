<?php
	error_reporting(0);
	session_start();

	if (!isset($_COOKIE['user_fName']) || empty($_COOKIE['user_fName'])) {
		$name = "Welcome";
	}else{
		$name = "Hi, ". $_COOKIE['user_fName'];
	}
?>
<!DOCTYPE html>
<html  lang="en">
	<head>
		<!-- <link rel="icon" href="img/logo.png" type="image/ico"> -->
		<!-- <link href="style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" /> -->
	</head>
	<body>
		<div class="parent">
			<div class="navbar">
				<a href="index.php"> <div class = "logo">  </div> </a>
				<div id="menus">
					<div id="open-menu"></div>
					<div class="menu">
						<a href="index.php"> <div class="linkMenu"> <p> Home  </p> </div> </a>
						<a href="shop.php"> <div class="linkMenu"> <p> Shop </p> </div> </a>
				</div>
				</div>
				<div class="user">
					<form method="post">
						<div class="logoUser">
							<!-- <img src="img/userlogo.png"/> -->
							<div id="ulCover">
								<div class="dropDownMenu">
									<div id="log" style="display: <?php if (!isset($_COOKIE['user_fName']) ||
											 empty($_COOKIE['user_fName'])) {
												echo "block";
											}else{
												echo "none";
											} ?>;" >

										<a href="login.php">Login</a> /
										<a href="sign_up.php">Sign Up</a>
									</div>
									<div id="logged" style="display: <?php if (!isset($_COOKIE['user_fName']) ||
											 empty($_COOKIE['user_fName'])) {
												echo "none";
											}else{
												echo "block";
											} ?>;" >

										<a href="account.php">
											<div class="loggedElements">
												My Account 
											</div>
										</a>
										<div class="loggedElements">
											<button name="log_out">Log Out</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="text"> <?= $name ?> </div>
					</form>
					
					<a href="bag.php"><div id="bag"></div></a>
					<!-- <a href="favorites.php"><div id="fav"></div></a> -->
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	// if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if( isset($_POST['log_out'])){
			setcookie("user_fName", "", time()+(86400*30), "/");
			setcookie("user_lName", "", time()+(86400*30), "/");
			setcookie("user_email", "", time()+(86400*30), "/");

			Header('Location: login.php');
		}
	// }
?>