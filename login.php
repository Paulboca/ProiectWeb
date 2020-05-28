<?php
error_reporting(0);
session_start();

if (isset($_COOKIE['user_fName']) && !empty($_COOKIE['user_fName'])) {
    Header('Location: account_info.php');
}

$_SESSION['email'] = $_POST['email'];
$_SESSION['pswd'] = $_POST['pswd'];
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
	<link href="style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link href="style_login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <meta charset="utf-8">
    <title>Fashion E-Shop</title>
</head>
<body>
		<?php
		include ('menu.php')
        ?>
      
    <form method="POST" >
        <div id="topline">
            <div class="textbox">
                <div class="login">
                    <p id="login_logo">Login</p>
                </div>
                
                <div class="login"> <br/>
                    <input type="email" id="email" name="email" 
                        maxlength="100" placeholder="Email"
                        value="<?= $_SESSION['email'];?>" required>
                </div>

                <div class="login"> <br/>
                    <input type="password" id="password" name="pswd" 
                        placeholder="Password" maxlength="100"
                        value="<?= $_SESSION['pswd'];?>" required>        
                </div>

                <div class="login">
                    <button  id="login_to_account">LOGIN TO ACCOUNT</button>
                    <p class="login" id="forgot_password">Forgot password?
                        <a href="change_passwd.php">Click here</a></p>
                </div>

                <div class="login">
                    <a class="login" id="sign_up" href="sign_up.php">SIGN UP</a>

                </div>
               
                <div id="php">
                    <?php include ('script_login.php'); ?>
                </div>
            </div>
        </div>
    </form>
</body>
</html>