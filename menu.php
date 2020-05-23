<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>
	<body>
		<div class="parent">
			<div class="navbar">
				<div class="menu">
					<ul>
						<li><img class = "logo" src="img/logo.png" alt="Imaginea campaniei"/></li>
						<li><a class="linkMenu" href="index.php">Home</a></li>
						<li><a class="linkMenu" href="#news">News</a></li>
						<li><a class="linkMenu" href="shop.php">Shop</a></li>
						<li><a class="linkMenu" href="login.php">Login</a></li>
						<li><a class="linkMenu" href="#shoppingbag">Shopping Bag</a></li>
						<li><a class="linkMenu" href="#favourites">Favourites</a></li>

						<li>
							<button><?= $_SESSION['user_email'];?></button>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>