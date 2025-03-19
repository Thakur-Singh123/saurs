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
//Check if image id exist or not
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['image_id'])) {
    $image_id = intval($_POST['image_id']); 
    //Get images
    $query = "SELECT images FROM images_attachments WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    //Check if image delete or not
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $image_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        //Check if image exists or not folder
        if ($row) {
            $image_path = "../uploads/galleries/" . $row['images'];
            //Delete the record from the database
            $delete_query = "DELETE FROM images_attachments WHERE id = ?";
            $delete_stmt = mysqli_prepare($conn, $delete_query);
            mysqli_stmt_bind_param($delete_stmt, "i", $image_id);
            $delete_result = mysqli_stmt_execute($delete_stmt);
           //Delete image for folder
            if ($delete_result) {
                //If the file exists, delete it
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $_SESSION['SUCCESS_MSG'] = "Image deleted successfully.";
                echo json_encode(["status" => "success", "message" => "Image deleted successfully."]);
            } else {
                $_SESSION['ERROR_MSG'] = "Error deleting gallery: " . $stmt->error;
                echo json_encode(["status" => "error", "message" => "Something went wrong!"]);
            }
        } else {
            echo "not_found"; 
            exit();
        }
    }
}
?>
