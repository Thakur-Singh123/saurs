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
//db call
include '../config/db.php';
//Create gallery
if (isset($_POST['submit'])) {
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];
    //Check if images are selected
    if (!empty($_FILES["choosefile"]["name"][0])) {
        foreach ($_FILES["choosefile"]["name"] as $key => $name) {
            $filename = basename($name);
            $tempname = $_FILES["choosefile"]["tmp_name"][$key];
            $folder = "../uploads/galleries/" . $filename;
            //Move file to uploads directory
            if (move_uploaded_file($tempname, $folder)) {
                //Create gallery db
                $sql = "INSERT INTO images_attachments (category_id, images, status) VALUES ('$category_id', '$filename', '$status')";
                $result = $conn->query($sql);
                //Check if data created or not
                if (!$result) {
                    $_SESSION['ERROR_MSG'] = "Error: " . $conn->error;
                    header('Location: add-new-gallery.php');
                    exit();
                }
            } else {
                $_SESSION['ERROR_MSG'] = "Error: Failed to upload $filename.";
                header('Location: add-new-gallery.php');
            }
        }
        //Success msg
        $_SESSION['SUCCESS_MSG'] = "Gallery created successfully.";
        header('Location: add-new-gallery.php');
    } else {
        $_SESSION['ERROR_MSG'] = "No images selected.";
        header('Location: add-new-gallery.php');
    }
}
?>
