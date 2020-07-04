<!doctype html>
<html lang="en">
<head>
    <meta name="Description" content="The succes page for the FES site.">
	<meta name="viewport" content="width=device-width">
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital@1&display=swap" rel="stylesheet">
	<link href="styles/style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link href="styles/style_succes.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    
    <meta charset="utf-8">
    <title>Fashion E-Shop</title>
</head>
<body>
		<?php
		include ('menu.php')
        ?>

    <div class="topline">
        <div class="textbox">
            <p class="message">Succes!</p>
        </div>
    </div>    
</body>
</html>
<?php
    Header('Refresh: 1; login.php');
?>