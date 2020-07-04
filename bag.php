<?php
    session_start();

    $link1 = mysqli_connect("localhost", "root", "", "shop");    
    if($link1 === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    if( isset($_POST['refresh'])){
        if($_POST['cant'] > 0){
            $sql1 = mysqli_prepare($link1, "UPDATE bag SET cantitate = ? WHERE id_produs = ? ");
            mysqli_stmt_bind_param($sql1, "dd", $_POST['cant'], $_POST['id']);
            mysqli_stmt_execute($sql1);
        }
        if($_POST['cant'] == 0){
            $sql1 = mysqli_prepare($link1, "DELETE FROM bag WHERE id_produs = ? ");
            mysqli_stmt_bind_param($sql1, "d", $_POST['id']);
            mysqli_stmt_execute($sql1);
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="Description" content="The shopping bag page for the FES site.">
	<meta name="viewport" content="width=device-width">
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
	<link href="styles/style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link href="styles/style_bag.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
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
                Shopping Bag
            </div>
            <div class="php">
                <?php
                    $sql = mysqli_prepare($link1, "SELECT id_produs, denumire, categorie, pret, cantitate from bag where id_client = ?");
                    mysqli_stmt_bind_param($sql, "d", $_COOKIE['device_id']);
                    mysqli_stmt_execute($sql);
                    mysqli_stmt_bind_result ( $sql, $id, $den, $cat, $pret, $cant);
                    
                    $sum = 0;
                    while( mysqli_stmt_fetch($sql)){
                        if( empty($id) && empty($den) && empty($cat) && empty($pret) && empty($cant))
                            echo "Cosul este gol";
                        else
                            $sum = $sum + ($cant * $pret);
                            echo '
                            <div class="produs">
                            <img class="image" alt="imagine produs" src="img/Products/'.$id.'.png">
                           <div class="lbox">
                               <div class="ltop">
                                   '.$den.'
                               </div>
                               <div class="lbottom">
                                    Categorie: '.$cat.'
                               </div>
                           </div>
                           <div class="rbox">
                               <div class="rlbox">
                                    <div class="rtop">
                                        Cantitate
                                    </div>
                                    <form method="post">
                                        <input type="number" name="cant" value='.$cant.'>
                                        <input class="hide" type="number" name="id" value='.$id.'>
                                        <button class="refresh" name="refresh"></button>
                                    </form>
                               </div>
                               <div class="rcbox">
                                    <div class="rtop">
                                        Pret buc.
                                    </div>
                                    '.$pret.'
                               </div>
                               <div class="rrbox">
                                    <div class="rtop">
                                        Pret total produs
                                    </div>
                                    '.$pret * $cant.'
                               </div>
                           </div>
                        </div>
                            ';
                    }
                    echo '
                    <div class="total">
                    Total: '.$sum.'
                    </div>
                    <div class="checkout">
                        <a href="checkout.php">CHECKOUT</a>
                    </div>
                    ';
                    mysqli_close($link1);
                ?>
            </div>
        </div>
    </div>
</body>
</html>