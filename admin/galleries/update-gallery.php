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
//Update gallery
if (isset($_POST['submit'])) {
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];
    //Ensure uploads directory exists
    $uploadDir = "../uploads/galleries/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadedFiles = [];
    //Process uploaded files
    foreach ($_FILES["choosefile"]["name"] as $key => $name) {
        $filename = time() . "_" . basename($name); 
        $tempname = $_FILES["choosefile"]["tmp_name"][$key];
        $filePath = $uploadDir . $filename;

        if (move_uploaded_file($tempname, $filePath)) {
            $uploadedFiles[] = $filename;
        }
    }
    //Update status for the category
    $sql_update = "UPDATE images_attachments SET status='$status' WHERE category_id='$category_id'";
    $result = $conn->query($sql_update);

    //Insert new images into the database
    if (!empty($uploadedFiles)) {
        foreach ($uploadedFiles as $file) {
            $sql_insert = "INSERT INTO images_attachments (category_id, images, status) VALUES ('$category_id', '$file', '$status')";
            $conn->query($sql_insert);
        }
    }
    //Check if category exist or not
    if ($result === TRUE) {
        $_SESSION['SUCCESS_MSG'] = "Gallery updated successfully.";
        header("Location: edit-gallery.php?id=$category_id"); 
        exit();
    } else {
        $_SESSION['ERROR_MSG'] = "Error updating gallery: " . $conn->error;
        header("Location: edit-gallery.php?id=$category_id"); 
        exit();
    }
}
?>
