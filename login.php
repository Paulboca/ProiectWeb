<?php
error_reporting(0);
session_start();
$_SESSION['email'] = $_POST['email'];
$_SESSION['pswd'] = $_POST['pswd'];
?>
<!doctype html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="style_menu.css" rel="stylesheet">
    <link href="style_login.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
		<?php
		include ('menu.php')
        ?>
      
    <form method="POST" >
        <div class="textbox">
            <div class="login">
                <p id="login_logo">Login</p>
            </div>
            
            <div class="login"> <br/>
                <input type="email" id="email" name="email" 
                    maxlength="100" placeholder="Email"
                    value="<?= $_SESSION['email'];?>" required>
            </div>

            <div class="login"> <br/>
                <input type="password" id="password" name="pswd" 
                    placeholder="Password" maxlength="100"
                    value="<?= $_SESSION['pswd'];?>" required>        
            </div>

            <div class="login">
                <button  id="login_to_account">LOGIN TO ACCOUNT</button>
                <p class="login" id="forgot_password">Forgot password?
                    <a href="change_passwd.php">Click here</a></p>
            </div>

            <div class="login">
                <a class="login" id="sign_up" href="sign_up.php">SIGN UP</a>

                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $email = $_POST['email'];
                        $passwd = $_POST['pswd'];

                        $link = mysqli_connect("localhost", "root", "", "fes");

                        if($link === false){
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }

                        if ( empty($email) || empty($passwd) ) {
                            echo "Complete the entire form";
            
                            } else{
            
                                $sql = "SELECT count(email) from users where email = '" . $email . " ' ";
                                $res = mysqli_query($link, $sql);
                                $row = mysqli_fetch_row($res);
                                if( $row[0] != 1 ){
                                    echo "This e-mail is not registered";
                                
                                }else{
                                    $sql = "SELECT count(passwd) from users where email = '" . $email . "' and passwd = '". $passwd . " ' ";
                                    $res = mysqli_query($link, $sql);
                                    $row = mysqli_fetch_row($res);

                                    if( $row[0] != 1 ){
                                        echo "Wrong password";
                                        
                                    } else{
                                        $_SESSION['user_email'] = $email;
                                        Header('Location: index.php');
                                    }
                                }
                            }
                        mysqli_close($link);
                    }
                ?>
            </div>
        </div>
    </form>
</body>
</html>