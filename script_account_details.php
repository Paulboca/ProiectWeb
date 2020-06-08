<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_COOKIE['user_email'];

    // if( isset($_POST['update'])){
        if( preg_match('/[\/\'"^£$%&*():;} {@#~?>!<>,|=_+¬-]/', $fName) != 0 ||
            preg_match('/[\/\'"^£$%&*():;} {@#~?>!<>,|=_+¬-]/', $lName) != 0){
            echo "Not allowed characters in form fields !!";
        }else{

            $link1 = mysqli_connect("localhost", "root", "", "shop");

            if($link1 === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            
            if ( empty($fName) || empty($lName)) {
                if(isset($_POST['email']) || isset($_POST['passwd'])){
                    //
                }else
                    echo "Complete the entire form";
            }else{            
                $sql = mysqli_prepare($link1, "UPDATE users SET fName = ?, lName = ? WHERE email = ? ");
                mysqli_stmt_bind_param($sql, "sss", $fName, $lName, $email);

                if(mysqli_stmt_execute($sql)){
                    mysqli_close($link1);
                    setcookie("user_fName", $fName, time()+(86400*30), "/");
                    setcookie("user_lName", $lName, time()+(86400*30), "/");

                    $_SESSION['load'] = "loadData";
                    Header('Location: succes.php');
                } else{
                    echo "Error: ". mysqli_error($link1);
                }
            } 
        }
// }
}
?>