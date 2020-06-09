<?php
	error_reporting(0);
	session_start();

	if (!isset($_COOKIE['user_fName']) || empty($_COOKIE['user_fName'])) {
		$name = "Welcome";
	}else{
		$name = "Hi, ". $_COOKIE['user_fName'];
	}
	
	if (!isset($_COOKIE['device_id']) || empty($_COOKIE['device_id'])) {

		$link0 = mysqli_connect("localhost", "root", "", "shop");
		if($link0 === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}

		$res = 1;
		while($res != 0 ){
			$random = rand(1,2000000000);

			$sql = mysqli_prepare($link0, "SELECT count(id_client) from bag where id_client = ? ");
			mysqli_stmt_bind_param($sql, "d", $random);
			mysqli_stmt_execute($sql);
			mysqli_stmt_bind_result ( $sql, $res);
			mysqli_stmt_fetch($sql);

			if($res == 0){
				setcookie("device_id", "$random", time()+(86400*30), "/");
			}
		}
		mysqli_close($link0);
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
				<div class="menus">
					<div class="open-menu"></div>
					<div class="menu">
						<a href="index.php"> <div class="linkMenu"> <p> Home  </p> </div> </a>
						<a href="shop.php"> <div class="linkMenu"> <p> Shop </p> </div> </a>
				</div>
				</div>
				<div class="user">
					<form method="post">
						<div class="logoUser">
							<!-- <img src="img/userlogo.png"/> -->
							<div class="ulCover">
								<div class="dropDownMenu">
									<div class="log" style="display: <?php if (!isset($_COOKIE['user_fName']) ||
											 empty($_COOKIE['user_fName'])) {
												echo "block";
											}else{
												echo "none";
											} ?>;" >

										<a href="login.php">Login</a> /
										<a href="sign_up.php">Sign Up</a>
									</div>
									<div class="logged" style="display: <?php if (!isset($_COOKIE['user_fName']) ||
											 empty($_COOKIE['user_fName'])) {
												echo "none";
											}else{
												echo "block";
											} ?>;" >

										<div class="loggedElements">
											<button name="myacc"> My Account </button>
										</div>
										<div class="loggedElements">
											<button name="log_out">Log Out</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="text"> <?= $name ?> </div>
					</form>
					
					<a href="bag.php"><div class="bag"></div></a>
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
		
		if( isset($_POST['myacc'])){
			$_SESSION['load'] = "loadData";

			Header('Location: account.php');
		}
	// }
?>