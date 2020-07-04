<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        $email = $_POST['email'];
        $passwd = $_POST['pswd'];
        $cpasswd = $_POST['cpswd'];
        
        if(preg_match('/[\/\'"^£$%&*():;} {@#~?>!<>,|=_+¬-]/', $passwd) != 0 || 
            preg_match('/[\/\'"^£$%&*():;} {#~?>!<>,|=_+¬-]/', $email) != 0 || 
            preg_match('/[\/\'"^£$%&*():;} {@#~?>!<>,|=_+¬-]/', $cpasswd) != 0 ||
            preg_match('/[\/\'"^£$%&*():;} {@#~?>!<>,|=_+¬-]/', $fname) != 0 ||
            preg_match('/[\/\'"^£$%&*():;} {@#~?>!<>,|=_+¬-]/', $lname) != 0){
            echo "Not allowed characters in form fields !!";
        }else{
            $link = mysqli_connect("localhost", "root", "", "shop");

            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            if ( empty($fname) || empty($lname) || empty($email) || empty($passwd) || empty($cpasswd) ) {
            echo "Complete the entire form";

            } elseif ($passwd != $cpasswd){
                echo "You typed two different passwords";
                
                }else{
                    $sql = mysqli_prepare($link, "INSERT INTO users (fName, lName, email, passwd) VALUES (?, ?, ?, ? )");
                    mysqli_stmt_bind_param($sql, "ssss",$fname, $lname, $email, $passwd);
                    
                    if(mysqli_stmt_execute($sql)){
                        mysqli_close($link);
                        Header('Location: succes.php');
                        
                    } else{
                        echo "This e-mail is registred already";//. mysqli_error($link);
                    }
               }
        }
    }
?>