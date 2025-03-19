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

//Check if category id request exist or not
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['category_id'])) {
    $category_id = intval($_POST['category_id']);

    //Get image paths before deleting from DB
    $sql = "SELECT images FROM `images_attachments` WHERE `category_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Delete image file folder
    while ($row = $result->fetch_assoc()) {
        $filePath = "../uploads/galleries/" . $row['images']; 
        if (file_exists($filePath)) {
            unlink($filePath); 
        }
    }
    $stmt->close();

    //Delete images attachments
    $sql = "DELETE FROM `images_attachments` WHERE `category_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $category_id);
    
    if ($stmt->execute()) {
        $_SESSION['SUCCESS_MSG'] = "Gallery deleted successfully.";
        echo json_encode(["status" => "success", "message" => "Gallery deleted successfully."]);
    } else {
        $_SESSION['ERROR_MSG'] = "Error deleting gallery: " . $stmt->error;
        echo json_encode(["status" => "error", "message" => "Something went wrong!"]);
    }

    $stmt->close();
    $conn->close();
}
?>
