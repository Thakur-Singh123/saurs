<?php
session_start();
include '../config.php'; 
//Destroy the session
session_destroy();
//Redirect
header("Location: " . SITE_URL . "nfts-tow");
exit();
?>
