<?php
$servername = "localhost";
$username = "pixxeluclients_saurs";
$password = "!eSMepMfpZg+";
$db_name = "pixxeluclients_saurs";
//Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>