<?php
//Session start
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Call config file
include '../config.php'; 
//Check if user exists or not
if (!isset($_SESSION['login_user'])) {
    header('Location: ' . BASE_URL . 'auth/login.php');
    exit(); 
}
//Call db
include '../config/db.php';
//Create category
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];
    //Insert category
    $sql = "INSERT INTO `categories`(`name`, `status`) VALUES ('$name','$status')";
    $result = $conn->query($sql);
    //Check if category created or not
    if ($result === TRUE) {
        $_SESSION['SUCCESS_MSG'] = "Category created successfully.";
        header('Location: add-new-category.php');
    } else {
        $_SESSION['ERROR_MSG'] = "Error: Something went wrong category not created.." . $sql . "<br>" . $conn->error;
        header('Location: add-new-category.php');
    }
}
?>
