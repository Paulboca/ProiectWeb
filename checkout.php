<?php
    session_start();
    // if (!isset($_COOKIE['user_email']) || empty($_COOKIE['user_email'])) {
    //     Header('Location: login.php');
    //     exit();
    // }

    $link1 = mysqli_connect("localhost", "root", "", "shop");    
    if($link1 === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if( isset($_POST['refresh'])){
        $sql1 = mysqli_prepare($link1, "UPDATE bag SET cantitate = ? WHERE id_produs = ? ");
        mysqli_stmt_bind_param($sql1, "dd", $_POST['cant'], $_POST['id']);
        mysqli_stmt_execute($sql1);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="Description" content="The shopping bag page for the FES site.">
	<meta name="viewport" content="width=device-width">
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
	<link href="style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="style_checkout.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <title>Fashion E-Shop</title>
</head>
<body>
		<?php
		include ('menu.php')
        ?>
        
    <div class="topline">
        <div class="container">
             <div class="shop_logo">
                CHECKOUT
            </div>
            <div class="php">
                //kljjlkjl
                <?php 
                    
                // if (!isset($_COOKIE['device_id']) || empty($_COOKIE['device_id']))
                //     echo"NULL";
                // else
                    echo $_COOKIE['device_id']; 
                ?>
            </div>
        </div>
    </div>
</body>
</html>