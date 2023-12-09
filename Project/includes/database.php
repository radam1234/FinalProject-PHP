<?php
// Database connection parameters
$servername = "172.31.22.43";
$username = "Ramsin200484980";
$password = "HBL6BO_2LU";
$dbname = "Ramsin200484980";

// Create a new MySQLi object for database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    // If connection failed, terminate the script and display an error message
    die("Connection failed: " . $conn->connect_error);
}
?>

