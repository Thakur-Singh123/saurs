<?php
session_start();
include '../admin/config/db.php';
//Check if data is created or not
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //Get sql data
    $sql_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql_query);
    $login_query = mysqli_fetch_assoc($result);

    //Check if login exist or not
    if ($login_query) {
        $hashed_password = $login_query['password'];

        //Verify the entered password 
        if (password_verify($password, $hashed_password)) {
            if ($login_query['user_type'] == 'admin') {
                $_SESSION['login_user'] = $login_query['email'];
                header('location: https://pixxeluclients.com/php-dev/saurs/admin/galleries/all-galleries');
            } elseif ($login_query['user_type'] == 'customer') {
                $_SESSION['login_info'] = $login_query['email'];
                header('location: https://pixxeluclients.com/php-dev/saurs/nfts-tow');
            } else {
                //Check if user exist or not
                $_SESSION['ERROR_MSG'] = "User details do not match.";
                header('Location: login.php');
                
            }
        } else {
            //Check if passowrd exist or not
            $_SESSION['ERROR_MSGa'] = "Your password is incorrect.";
            header('Location: login.php');
        }
    } else {
        //Check if user name exist or not
        $_SESSION['ERROR_MSG'] = "Your username is incorrect.";
        header('Location: login.php');
    }
}
?>  
