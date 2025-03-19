<?php
// Detect if HTTPS is enabled
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";

// Get the domain name dynamically
$host = $_SERVER['HTTP_HOST'];

// Define the base URLs
define('SITE_URL', $protocol . "://" . $host . "/php-dev/saurs/");
define('ADMIN_URL', $protocol . "://" . $host . "/php-dev/saurs/admin/");
?>
