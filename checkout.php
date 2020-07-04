<?php
    session_start();

    if( isset($_POST['complete_order'])){
        $link1 = mysqli_connect("localhost", "root", "", "shop");    
        if($link1 === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        $sql = mysqli_prepare($link1, "SELECT id_produs, denumire, categorie, pret, cantitate from bag where id_client = ?");
        mysqli_stmt_bind_param($sql, "d", $_COOKIE['device_id']);
        mysqli_stmt_execute($sql);
        mysqli_stmt_bind_result ( $sql, $id, $den, $cat, $pret, $cant);

        $sum = 0; $msg = "";
        while( mysqli_stmt_fetch($sql)){
            $sum = $sum + ($cant * $pret);
            $msg = $msg.'Id Produs: '.$id.'   Denumire: '.$den.'   Categorie: '.$cat.'   Pret: '.$pret.'   Cantitate: '.$cant.'   Total Produs: '.$cant * $pret." \n";
            $msg = wordwrap($msg,200);
        }
        $msg = $msg."\n TOTAL: ".$sum;
        mail("fes@gmail.com", "New Order FES", $msg);

        Header('Location: succes.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="Description" content="The checkout page for the FES site.">
	<meta name="viewport" content="width=device-width">
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
	<link href="styles/style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="styles/style_checkout.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
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
            <form method="post">
                <div class="shop_logo">
                    CHECKOUT
                </div>
                <div class="php">
                    <div class="titlu">Adress</div>
                    <div class="tlb">
                        <div class="elem">
                            <label for="county">County: </label>
                            <input type="text" id="county" required>
                        </div>
                        <div class="elem">
                            <label for="street">Street: </label>
                            <input type="text" id="street" required>
                        </div>
                        <div class="elem">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" required>
                        </div>
                    </div>
                    <div class="trb">
                        <div class="elem">
                            <label for="city">City: </label>
                            <input type="text" id="city" required>
                        </div>
                        <div class="elem">
                            <label for="no">No:</label>
                            <input type="text" id="no" required>
                        </div>
                        <div class="elem">
                            <label for="email">E-mail:</label>
                            <input type="text" id="email" value="<?php 
                                if( isset($_COOKIE['user_email'])){
                                    echo $_COOKIE['user_email'];
                                }
                            ?>"  required>
                        </div>
                    </div>
                </div>
                <div class="complete">
                    <button name="complete_order">Complete Order</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>