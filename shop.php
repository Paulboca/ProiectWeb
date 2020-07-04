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
	die ('ERROR: Could not connect.');
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
        <div class="filter" id="myBtnContainer">
          <input class="searchbox" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
          <button class="btn active" onclick="filterSelection('all')"> Show all</button>
          <button class="btn" onclick="filterSelection('Femei')"> Femei</button>
          <button class="btn" onclick="filterSelection('Barbati')"> Barbati</button>
          <button class="btn" onclick="filterSelection('Copii')"> Copii</button>
        </div>

		<div class="wrapper2" id="wrapper2">

        
                <?php
                if (!($rez = $mysql->query ('select id,denumire,pret,categorie from products'))) {
                    die ('A survenit o eroare la interogare');
                } 
                while ($inreg = $rez->fetch_assoc()) {
                    echo('<li class="box '.$inreg['categorie'].'" id="box">
                        <p class="nume_prod">'.$inreg['denumire'].'</p>
                        <img class="prod_img" src="img/Products/'.$inreg['id'].'.png" alt="">
                        <form action="details.php" method="post"><input class="f_input1" type="text" name="prd" id="prd" value="'.$inreg['id'].'" size="30" >
                        </p>
                        <p><input class="button1" type="submit" value="Detalii"/></p>
                        </form>
                        <form action="shop.php" method="post"><input class="f_input1" type="text" name="prd" id="prd" value="'.$inreg['id'].'" size="30" >
                        </p>
                        <p><input class="button2" type="submit" value="Add to cart"/></p>
                        </form>
                        <div class="pret">'.$inreg['pret'].' Lei</div>
                        </li>
                        ');
                }
                ?>

            </div>
		</div>
		<?php
		include ('footer.php')
		?>


<?php
    if( isset($_POST['prd'])){
    $prd = $_POST["prd"];
    $testProd='select id_produs,id_client from bag where id_produs='.$prd.' and id_client='.$_COOKIE['device_id'].';';
        if (!($rez2 = $mysql->query ($testProd))) {
            die ('A survenit o eroare la interogare');
        } 
        echo $_COOKIE['device_id'];
        if(is_null($rez2->fetch_assoc())){
            $instructiune='select id,denumire,categorie,pret from products where id='.$prd.';';
            if (!($rez3 = $mysql->query ($instructiune))) {
                die ('A survenit o eroare la interogare');
            } 
            while ($inreg = $rez3->fetch_assoc()) {
                if( isset($user_id)){$instructiune='insert into bag (id_produs,denumire,categorie,pret,cantitate,id_client) values ('.$inreg['id'].',"'.$inreg['denumire'].'","'.$inreg['categorie'].'",'.$inreg['pret'].',1'.$_COOKIE['device_id'].')';}
            else {$instructiune='insert into bag (id_produs,denumire,categorie,pret,cantitate,id_client) values ('.$inreg['id'].',"'.$inreg['denumire'].'","'.$inreg['categorie'].'",'.$inreg['pret'].',1,'.$_COOKIE['device_id'].')';}
            }
            if (!($rez3 = $mysql->query ($instructiune))) {
                            die ('Error on query');
            }
        }
        else{
            echo '<script>alert("Produsul este deja in cos")</script>';
        }
    }
?>
<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("wrapper2");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("p")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            addClass(li[i], "show");
        } else {
            removeClass(li[i], "show");
        }
    }
}

filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("box");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    removeClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) addClass(x[i], "show");
  }
}

function addClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function removeClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}

</script>

	</body>
</html>