<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $passwd = $_POST['pswd'];

        if(preg_match('/[\/\'"^£$%&*():;} {@#~?>!<>,|=_+¬-]/', $passwd) != 0 || 
            preg_match('/[\/\'"^£$%&*():;} {#~?>!<>,|=_+¬-]/', $email) != 0){
            echo "Not allowed characters in form fields !!";
        }else{
            $link1 = mysqli_connect("localhost", "root", "", "shop");

            if($link1 === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            if ( empty($email) || empty($passwd) ) {
                echo "Complete the entire form";

                } else{

                    $sql = mysqli_prepare($link1, "SELECT count(email) from admins where email = ? ");
                    mysqli_stmt_bind_param($sql, "s", $email);
                    mysqli_stmt_execute($sql);
                    mysqli_stmt_bind_result ( $sql, $res);
                    mysqli_stmt_fetch($sql);
                    if( $res != 1 ){
                        echo "This e-mail is not registered";
                    
                    }else{
                        mysqli_close($link1);
                        $link2 = mysqli_connect("localhost", "root", "", "shop");
                        if($link2 === false){
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }

                        $sql = mysqli_prepare($link2, "SELECT count(passwd) from admins where email = ? and passwd = ? ");
                        mysqli_stmt_bind_param($sql, "ss", $email, $passwd);
                        mysqli_stmt_execute($sql);
                        mysqli_stmt_bind_result ( $sql, $res);
                        mysqli_stmt_fetch($sql);

                        if( $res != 1 ){
                            echo "Wrong password";
                            
                        } else{
                            mysqli_close($link2);
                            
                            $_SESSION["admin_email"] = $email;
                            Header('Location: admin.php');
                        }
                    }
                }
        }
    }
?>