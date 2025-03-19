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
//Check if id is exist or not
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    //Delete category
    $sql = "DELETE FROM `categories` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    //Check if category deleted or not
    if ($stmt->execute()) {
        $_SESSION['SUCCESS_MSG'] = "Category deleted successfully.";
    } else {
        $_SESSION['ERROR_MSG'] = "Error deleting Category: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
