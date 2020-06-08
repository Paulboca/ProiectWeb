<?php
session_start();
    if (!isset($_SESSION['admin_email']) || empty($_SESSION['admin_email'])) {
        Header('Location: login_admin.php');
        exit();
    }
?>
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
  <meta charset="UTF-8">
  <link href="style_admin.css" rel="stylesheet">
  </head>
<body>
  <label>Use the Select fields if you want to see the query results. For everything else use this one</label>
    <form action="admin.php" method="post">
    <input type="text" name="instruction">
    <input type="submit"><br/>
  </form>
    <?php
    if( isset($_POST['instruction'])){
    $instruction = $_POST["instruction"];
    if (!($rez = $mysql->query ($instruction))) {
                    die ('Error on query');
    }  
    else echo ($instruction." executed succesfully!");
    }
?>
  <form action="admin.php" method="post">
    <label><b>Select</b></label>
    <input type="text" name="fields">
    <input type="text" name="rest">
    <input type="submit"><br/>
    <label>First field is for column names (Example : year,name,age). The second field is for the rest of the select</label>
    <br>
    <button type="submit" name="log_out">Log Out</button>
  </form>

  <div class="results">
  
  <?php 
  if( isset($_POST['log_out'])){
    $_SESSION['admin_email'] = "";
  
    Header('Location: login_admin.php');
  }
  if( isset($_POST['fields'])){
    $fields = $_POST["fields"];
    if( isset($_POST['rest'])){
    $rest = $_POST["rest"];
    echo ("\"select ".$fields." ".$rest."\" returned :");
    if (!($rez = $mysql->query ('select '.$fields.' '.$rest))) {
                    die ('Error on query');
    } 
    $columns = explode (",", $fields);
    while ($inreg = $rez->fetch_assoc()) {
        foreach ($columns as $item) {
            echo ("<p class=\"valoare\">".$item." : ".$inreg[$item]. "</p>");
        }
        
        echo "<br>";
    }
    } 
}
  ?>
  </div>
</body>
</html>