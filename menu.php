<?php
	error_reporting(0);
	session_start();

	if (!isset($_COOKIE['user_fName']) || empty($_COOKIE['user_fName'])) {
		$name = "My Account";
	}else{
		$name = "Hi, ". $_COOKIE['user_fName'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- <link rel="icon" href="img/logo.png" type="image/ico"> -->
		<!-- <link href="style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" /> -->
	</head>
	<body>
		<div class="parent">
			<div class="navbar">
				<a href="index.php"> <div class = "logo">  </div> </a>
				<div class="menu">
					<ul>
						<a class="linkMenu" href="index.php">Home</a>
						<a class="linkMenu" href="shop.php">Shop</a>
						
						<a class="linkMenu" href="#news">News</a>
						<a class="linkMenu" href="#news">News</a>
						<a class="linkMenu" href="#news">News</a>
					</ul>
				</div>
				<div class="user">
					<form method="post">
						<div class="logoUser">
							<!-- <img src="img/userlogo.png"/> -->
							<div id="ulCover">
								<div class="dropDownMenu">
									<a id="log" href="login.php">Login</a>
									<button name="abc"> <?= $_COOKIE['user_email']?></button>
									<button name="log_out">Log Out</button>
								</div>
							</div>
						</div>
						<div id="text"> <?= $name ?> </div>
					</form>
					
					<a href="#shoppingbag"><div id="bag"></div></a>
					<a href="#favorites"><div id="fav"></div></a>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	// if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if( isset($_POST['log_out'])){
			setcookie("user_fName", "", time()+(86400*30), "/");
			setcookie("user_email", "", time()+(86400*30), "/");

			Header('Location: login.php');
		}
		if( isset($_POST['abc'])){
			Header('Location: sign_up.php');
		}
	// }
?>