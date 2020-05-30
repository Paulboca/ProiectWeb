<?php
    session_start();
    if (!isset($_COOKIE['user_email']) || empty($_COOKIE['user_email'])) {
        Header('Location: login.php');
        exit();
    }
    $user_email = $_COOKIE['user_email'];
    $link = "";
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
	<link href="style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link href="style_account.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <meta charset="utf-8">
    <title>Fashion E-Shop</title>
</head>
<body>
		<?php
		include ('menu.php')
        ?>
        
    <div id="topline">
        <div id="container">
            <div id="leftbox">
                <form method="post">
                    <div class="lbItem">
                        <button name="address">Address</button>
                    </div>
                    <div class="lbItem">
                        <button name="abc">Shop</button>
                    </div>
                </form>
            </div>

            <?php
                if( isset($_POST['index'])){
                    $link = "index.php";
                }
                if( isset($_POST['abc'])){
                    $link = "shop.php";
                }
            ?>

            <div id="textbox">
                <?php
                //  include('index.php');
                 include($link);
                ?>
            </div>
        </div>
    </div>
</body>
</html>
