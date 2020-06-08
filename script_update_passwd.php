<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apasswd = $_POST['apasswd'];
    $passwd = $_POST['passwd'];
    $cpasswd = $_POST['cpasswd'];
    $email = $_COOKIE['user_email'];

    // if( isset($_POST['update'])){
        if( preg_match('/[\/\'"^£$%&*():;} {@#~?>!<>,|=_+¬-]/', $apasswd) != 0 ||
            preg_match('/[\/\'"^£$%&*():;} {@#~?>!<>,|=_+¬-]/', $cpasswd) != 0 ||
            preg_match('/[\/\'"^£$%&*():;} {@#~?>!<>,|=_+¬-]/', $passwd) != 0){
            echo "Not allowed characters in form fields !!";
        }else{

            $link1 = mysqli_connect("localhost", "root", "", "shop");

            if($link1 === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            
            if ( empty($apasswd) || empty($passwd) || empty($cpasswd)) {
                if(isset($_POST['email']) || isset($_POST['fName'])){
                    //
                }else
                    echo "Complete the entire form";
            }else{
                $sql = mysqli_prepare($link1, "SELECT passwd from users WHERE email = ? ");
                mysqli_stmt_bind_param($sql, "s",$email );
                mysqli_stmt_execute($sql);
                mysqli_stmt_bind_result ( $sql, $res);
                mysqli_stmt_fetch($sql);

                if( $res != $apasswd ){
                    echo "Wrong Current Password";

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

                            $_SESSION['load'] = "loadPasswd";
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