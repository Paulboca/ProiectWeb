<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST['fName'];
        $lname = $_POST['lName'];
        $email = $_POST['email'];
        $passwd = $_POST['pswd'];
        $cpasswd = $_POST['cpswd'];
        
        $link = mysqli_connect("localhost", "root", "", "shop");

        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        if ( empty($fname) || empty($lname) || empty($email) || empty($passwd) || empty($cpasswd) ) {
        echo "Complete the entire form";

        } elseif ($passwd != $cpasswd){
            echo "You typed two different passwords";
            
            }else{
                $sql = "INSERT INTO users (fName, lName, email, passwd) VALUES ('$fname', '$lname', '$email', '$passwd')";

                if(mysqli_query($link, $sql)){
                    Header('Location: succes.php');
                    
                } else{
                    echo "This e-mail is registred already";//. mysqli_error($link);
                }
        }
        mysqli_close($link);
    }
?>