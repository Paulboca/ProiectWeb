<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital@1&display=swap" rel="stylesheet">
	<link href="style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link href="style_succes.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    
    <meta charset="utf-8">
    <title>Fashion E-Shop</title>
</head>
<body>
		<?php
		include ('menu.php')
        ?>
        <div class="textbox">
        <p id="message">Succes!</p>
        </div>
        <?php
        Header('Refresh: 2; login.php');
        ?>
</body>
</html>