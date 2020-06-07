<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $passwd = $_POST['pswd'];
        $cpasswd = $_POST['cpswd'];
        
        if(preg_match('/[\/\'"^£$%&*():;} {@#~?>!<>,|=_+¬-]/', $passwd) != 0 || 
            preg_match('/[\/\'"^£$%&*():;} {#~?>!<>,|=_+¬-]/', $email) != 0 || 
            preg_match('/[\/\'"^£$%&*():;} {@#~?>!<>,|=_+¬-]/', $cpasswd) != 0){
            echo "Not allowed characters in form fields !!";
        }else{
            $link1 = mysqli_connect("localhost", "root", "", "shop");
            
            if($link1 === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            
            if ( empty($email) || empty($passwd) || empty($cpasswd) ) {
            echo "Complete the entire form";
            }else{            
                $sql = mysqli_prepare($link1, "SELECT count(email) from users WHERE email = ? ");
                mysqli_stmt_bind_param($sql, "s", $email);
                mysqli_stmt_execute($sql);
                mysqli_stmt_bind_result ( $sql, $res);
                mysqli_stmt_fetch($sql);

                if( $res != 1 ){
                    echo "This e-mail is not registered";

                }elseif ($passwd != $cpasswd){
                        echo "You typed two different passwords";
                        
                        }else{
                            mysqli_close($link1);
                            $link2 = mysqli_connect("localhost", "root", "", "shop");
                            if($link2 === false){
                                die("ERROR: Could not connect. " . mysqli_connect_error());
                            }

                            $sql = mysqli_prepare($link2, "UPDATE users SET passwd = ? WHERE email = ? ");
                            mysqli_stmt_bind_param($sql, "ss", $passwd, $email);

                            if(mysqli_stmt_execute($sql)){
                                mysqli_close($link2);
                                Header('Location: succes.php');

                            } else{
                                echo "Error: ". mysqli_error($link2);
                            }

                        }
            } 
        }
    }
?>