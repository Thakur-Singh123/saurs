<?php
session_start();
include '../admin/config/db.php';
//Check if data created or not
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];

    //Validate password length
    if (strlen($password) !== 12) {
        //Check if password 12 characters or not
        $_SESSION['ERROR_MSG'] = "Password must be exactly 12 characters.";
        header('Location: register.php');
    } else if ($password != $confirm_password) {
        //Check if email or not
        $_SESSION['ERROR_MSG'] = "Password and confirm password do not match.";
        header('Location: register.php');
    } else {
        //Use password_hash for secure password hashing
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);
        $confirm_password_hashed = password_hash($confirm_password, PASSWORD_BCRYPT);

        //Check if email already exists
        $check_email_sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $check_email_result = mysqli_query($conn, $check_email_sql);

        if (mysqli_num_rows($check_email_result) > 0) {
            // Email already exists, display an error message
            $_SESSION['ERROR_MSG'] = "This email is already exist, Please try new email.";
            header('Location: register.php');
        } else {
            //Email is unique, proceed with registration
            $insert_sql = "INSERT INTO `users`(`name`,`email`,`mobile`,`address`,`password`,`confirm_password`) VALUES ('$name','$email','$mobile','$address','$password_hashed','$confirm_password_hashed')";
            $insert_run = mysqli_query($conn, $insert_sql);

            if ($insert_run === TRUE) {
                $_SESSION['SUCCESS_MSG'] = "User Register created successfully.";
                header('Location: register.php');
            } else {
                $_SESSION['ERROR_MSG'] = "Error: Something went wrong, register not created." . $insert_sql . "<br>" . $conn->error;
                header('Location: register.php');
            }
        } 
        $conn->close();
    }
}
?>
