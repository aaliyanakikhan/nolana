<?php
$host = "localhost"; // Host name
$username = "root";  // Database username
$password = "";      // Database password
$database = "user_db"; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
