<?php
    session_start();
    // if (!isset($_COOKIE['user_email']) || empty($_COOKIE['user_email'])) {
    //     Header('Location: login.php');
    //     exit();
    // }

    // $user_email = $_COOKIE['user_email'];
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
	<link href="style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link href="style_bag.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <meta charset="utf-8">
    <title>Fashion E-Shop</title>
</head>
<body>
		<?php
		include ('menu.php')
        ?>
        
    <div class="topline">
        <div class="container">
            <div class="rightbox" id="rightbox">
                <div class="produs">
                    
                </div>
                <?php
                    $link1 = mysqli_connect("localhost", "root", "", "shop");
        
                    if($link1 === false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }

                    $sql = mysqli_prepare($link1, "SELECT denumire, categorie, pret, cantitate from bag");
                    // mysqli_stmt_bind_param($sql, "s", $email);
                    mysqli_stmt_execute($sql);
                    mysqli_stmt_bind_result ( $sql, $den, $cat, $pret, $cant);
                    
                    while( mysqli_stmt_fetch($sql)){
                        if( empty($den) || empty($cat) || empty($pret) || empty($cant))
                        echo "NULL";
                        else
                        echo "$den, $cat, $pret, $cant <br>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>