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
    	<link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
		<link href="styles/style_menu.css" rel="stylesheet">
		<link href="styles/style_shop.css" rel="stylesheet">
		<title>Fashion E-Shop</title>
	</head>
	<body>
		<?php
        include ('menu.php')
		?>
	
		<div class="main">
		<div class="wrapper2">
        
                <?php
                $prd = $_REQUEST["prd"];
                if (!($rez = $mysql->query ('select id,denumire,descriere,compozitie,pret from products where id='.$prd))) {
                    die ('A survenit o eroare la interogare');
                } 
                while ($inreg = $rez->fetch_assoc()) {
                    echo('
    <img src="img/Products/'.$inreg['id'].'.png">		
	<div class="detail">
	<section class="name-price">
							<h1 class="name-product">'.$inreg['denumire'].'</h1>
							
							<div class="price"><div class="price-product">
            <span class="price-value">'.$inreg['pret'].'LEI</span>
            </div>
    </div>
	</section>
	<ul class="marime" >
    <li class="item  " data-code="">
    <div class="picker-option">
		
		<text class="value">Selectare mărime</text>

	</div>
	</li>
	</ul>
	<div class="pick-option">
		<button type="button" class="option"><span class="value  ">XS</span></button>
		<button type="button" class="option"><span class="value  ">S</span></button>
		<button type="button" class="option"><span class="value  ">M</span></button>
		<button type="button" class="option"><span class="value  ">L</span></button>
		<button type="button" class="option"><span class="value  ">XL</span></button>
		<button type="button" class="option"><span class="value  ">XXL</span></button>
	</div>
	<p class="product-details">'.$inreg['descriere'].'</p>
	<p class="product-details">'.$inreg['compozitie'].'</p>
                            ');
                }
                $mysql->close();
                ?>
            </div>
            
		</div>
	<div class="footer-bottom">
		<div class="footer-content">
			<h1 class= "logo-text"><span>Fashion E-Shop</span></h1>
				<p> Welcome to our shop. Enjoy the sales! </p>
				<p> Contact us for any problem. </p>
				<p> Email: fasione-shop@gmail.com </p>
				<p> Phone: 0754800865 </p>
		</div>
	</div>
	<button id="myBtn"><a href="#top" style="color: black">Top</a></button>
	</body>
</html>