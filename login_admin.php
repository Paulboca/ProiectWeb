<?php
// error_reporting(0);
session_start();

// if (isset($_COOKIE['user_fName']) && !empty($_COOKIE['user_fName'])) {
//     Header('Location: account.php');
// }

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
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="Description" content="The login page for the FES site.">
	<meta name="viewport" content="width=device-width">
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
	<link href="styles/style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link href="styles/style_login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <meta charset="utf-8">
    <title>Fashion E-Shop</title>
</head>
<body>
		<?php
		include ('menu.php')
        ?>
      
    <form method="POST" >
        <div class="topline">
            <div class="textbox">
                <div class="login">
                    <p class="login_logo">Admin Login</p>
                </div>
                
                <div class="login"> <br/>
                    <label class="ll" for="email">E-mail</label>
                    <input type="email" id="email" name="email" 
                        maxlength="100" placeholder="Email"
                        value="<?= $_SESSION['email'];?>" required>
                </div>

                <div class="login"> <br/>
                    <label class="ll" for="password">Password</label>
                    <input type="password" id="password" name="pswd" 
                        placeholder="Password" maxlength="100"
                        value="<?= $_SESSION['pswd'];?>" required>        
                </div>

                <div class="login">
                    <button  id="login_to_account">LOGIN TO ADMIN ACCOUNT</button>
                </div>
               
                <div class="php">
                    <?php include ('php_scripts/script_login_admin.php'); ?>
                </div>
            </div>
        </div>
    </form>
</body>
</html>