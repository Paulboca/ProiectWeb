<!DOCTYPE html>
<?php
$mysql = new mysqli (
	'localhost', // locatia serverului (aici, masina locala)
	'root',       // numele de cont
	'',    // parola (atentie, in clar!)
	'shop'   // baza de date
	);

// verificam daca am reusit
if (mysqli_connect_errno()) {
	die ('Conexiunea a esuat...');
}
?>
<html>
	<head lang="en">
		<meta charset="utf-8">
		<link href="style_menu.css" rel="stylesheet">
		<link href="style_shop.css" rel="stylesheet">
		<title>Fashion E-Shop</title>
	</head>
	<body>
		<?php
        include ('menu.php')
		?>
		<div class="main">
		<div class="wrapper2">
        
                <?php
                if (!($rez = $mysql->query ('select id,denumire,pret from products'))) {
                    die ('A survenit o eroare la interogare');
                } 
                while ($inreg = $rez->fetch_assoc()) {
                    echo('<div class="box"><div class="nume_prod">'.$inreg['denumire'].'</div><img class="prod_img" src="img/Products/'.$inreg['id'].'.png" alt=""><form action="test.php" method="post"><input class="f_input1" type="text" name="nume" id="nume" value="'.$inreg['id'].'" size="30" ></p><p><input class="button1" type="submit" value="Detalii"/></p></form><button class="button2">Add to cart</button><div class="pret">'.$inreg['pret'].' Lei</div></div>');
                }
                $mysql->close();
                ?>
		</div>

	</body>
</html>