<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // if( isset($_POST['update'])){
        if( preg_match('/[\/\'"^£$%&*():;} {#~?>!<>,|=_+¬-]/', $email) != 0){
            echo "Not allowed characters in form fields !!";
        }else{

            $link1 = mysqli_connect("localhost", "root", "", "shop");

            if($link1 === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            
            if ( empty($email)) {
                if(isset($_POST['passwd']) || isset($_POST['fName'])){
                    //
                }else
                    echo "Complete the entire form";
            }else{            
                $sql = mysqli_prepare($link1, "SELECT count(email) from users WHERE email = ? ");
                mysqli_stmt_bind_param($sql, "s", $email );
                mysqli_stmt_execute($sql);
                mysqli_stmt_bind_result ( $sql, $res);
                mysqli_stmt_fetch($sql);

                if( $res != 0 ){
                    echo "This e-mail is already registered";

                }else{
                    mysqli_close($link1);
                    $link2 = mysqli_connect("localhost", "root", "", "shop");
                    if($link2 === false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }

                    $sql = mysqli_prepare($link2, "UPDATE users SET email = ? WHERE email = ? ");
                    mysqli_stmt_bind_param($sql, "ss", $email, $_COOKIE['user_email']);

                    if(mysqli_stmt_execute($sql)){
                        mysqli_close($link2);
                        setcookie("user_email", $email, time()+(86400*30), "/");

                        $_SESSION['load'] = "loadEmail";
                        Header('Location: succes.php');
                    } else{
                        echo "Error: ". mysqli_error($link2);
                    }

                }
            } 
        }
// }
}
?>