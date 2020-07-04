<?php
    session_start();
    if (!isset($_COOKIE['user_email']) || empty($_COOKIE['user_email'])) {
        Header('Location: login.php');
        exit();
    }

    $user_email = $_COOKIE['user_email'];
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
	<link href="styles/style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link href="styles/style_favorites.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <meta charset="utf-8">
    <title>Fashion E-Shop</title>
</head>
<body>
		<?php
		include ('menu.php')
        ?>
        
    <div id="topline">
        <div class="textbox">
            Favorites
        </div>
    </div>
</body>
</html>