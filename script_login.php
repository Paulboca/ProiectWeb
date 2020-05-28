<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $passwd = $_POST['pswd'];

        $link = mysqli_connect("localhost", "root", "", "shop");

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
                        $sql = "SELECT fName from users where email = '" . $email . " ' ";
                        $res = mysqli_query($link, $sql);
                        $row = mysqli_fetch_row($res);
                        setcookie("user_fName", $row[0], time()+(86400*30), "/");

                        setcookie("user_email", $email, time()+(86400*30), "/");
                        Header('Location: account_info.php');
                    }
                }
            }
        mysqli_close($link);
    }
?>