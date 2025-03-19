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
//Update category
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    //Get category detail
    $sql_query = "UPDATE categories SET name='$name', status='$status' WHERE id='$id'";
    $result = $conn->query($sql_query);
    //Check if category update or not
    if ($result === TRUE) {
        $_SESSION['SUCCESS_MSG'] = "Category updated successfully.";
        header("Location: edit-category?id=$id"); 
    } else {     
        $_SESSION['ERROR_MSG'] = "Error: Category not updated " . $sql_query . "<br>" . $conn->error;
        header("Location: edit-category?id=$id"); 
    }
}
?>
