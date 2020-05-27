<?php
    session_start();
    if (!isset($_COOKIE['user_email']) || empty($_COOKIE['user_email'])) {
        Header('Location: login.php');
        exit();
    }

    $user_email = $_COOKIE['user_email'];
    // serve the page normally.
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="img/logo.png" type="image/ico"> <!-- favicon -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
	<link href="style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link href="style_login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
		<?php
		include ('menu.php')
        ?>
        <div class="textbox">
            <?= $_COOKIE["user_email"] ?> esti autentificat !! <?= $user_email?>
        </div>
</body>
</html>