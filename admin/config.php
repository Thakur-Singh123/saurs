<?php
// Detect if HTTPS is enabled
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";

// Get the domain name dynamically
$host = $_SERVER['HTTP_HOST']; 

//Define the base URL
define('BASE_URL', $protocol . "://" . $host . "/php-dev/saurs/");
?>
