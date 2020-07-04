<?php
    session_start();
    if (!isset($_COOKIE['user_email']) || empty($_COOKIE['user_email'])) {
        Header('Location: login.php');
        exit();
    }
    $user_email = $_COOKIE['user_email'];
    // $_SESSION['link'] = "";
    if (!isset($_SESSION['load']) || empty($_SESSION['load'])) {
        $_SESSION['load'] = "loadData";
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="Description" content="The my account page for the FES site.">
	<meta name="viewport" content="width=device-width">
    <link rel="icon" href="img/favicon.png" type="image/ico"> <!-- favicon -->
	<link href="styles/style_menu.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<link href="styles/style_account.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <meta charset="utf-8">
    <title>Fashion E-Shop</title>
</head>
<body>
		<?php
		include ('menu.php')
        ?>
        
    <div class="topline">
        <div class="container">
            <div class="leftbox">
                <div class="lbItem">
                    <button id="loadData" type="button" onclick="accountDetails()">Personal Data</button>
                </div>
                <div class="lbItem">
                    <button id="loadEmail" type="button" onclick="Uemail()" >Change Email</button>
                </div>
                <div class="lbItem">
                    <button id="loadPasswd" type="button" onclick="Upasswd()" >Change Password</button>
                </div>
                <!-- <div class="lbItem">
                    <button type="button" onclick="fav()" >Favorites</button>
                </div> -->
            </div>
            <div class="php">
                <?php
                    include ("php_scripts/script_account_details.php");
                    include ("php_scripts/script_update_email.php");
                    include ("php_scripts/script_update_passwd.php");
                ?>
            </div>

            <div class="rightbox" id="rightbox">
            </div>
        </div>
    </div>
</body>
</html>
<script>
    document.addEventListener('readystatechange', event => { 
    if (event.target.readyState === "complete") {
        document.getElementById("<?= $_SESSION['load'] ?>").click();
    }
    });

    function accountDetails() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rightbox").innerHTML = this.responseText;
            }
            };
        xhttp.open("GET", "account_details.php", true);
        xhttp.send();
    }

    function Uemail() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rightbox").innerHTML = this.responseText;
            }
            };
        xhttp.open("GET", "update_email.php", true);
        xhttp.send();
    }

    function Upasswd() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rightbox").innerHTML = this.responseText;
            }
            };
        xhttp.open("GET", "update_passwd.php", true);
        xhttp.send();
    }

    // function fav() {
    //     var xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             document.getElementById("rightbox").innerHTML = this.responseText;
    //         }
    //         };
    //     xhttp.open("GET", "favorites.php", true);
    //     xhttp.send();
    // }

</script>