<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $passwd = $_POST['pswd'];
        $cpasswd = $_POST['cpswd'];
        
        $link = mysqli_connect("localhost", "root", "", "shop");
        
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        
        if ( empty($email) || empty($passwd) || empty($cpasswd) ) {
        echo "Complete the entire form";
        }else{
            
            $sql = "SELECT count(email) from users WHERE email = '" . $email . "'";
            $res = mysqli_query($link, $sql);
            $row = mysqli_fetch_row($res);

            if( $row[0] != 1 ){
                echo "This e-mail is not registered";

            }elseif ($passwd != $cpasswd){
                    echo "You typed two different passwords";
                    
                    }else{
                        
                        $sql = "UPDATE users SET passwd = '" . $passwd . "' WHERE email = '" . $email . "'";

                        if(mysqli_query($link, $sql)){
                            Header('Location: succes.php');

                        } else{
                            echo "Error: ". mysqli_error($link);
                        }

                    }
        }
        mysqli_close($link);
    }
?>