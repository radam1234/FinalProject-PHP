<?php
$servername = "172.31.22.43";
$username = "Ramsin200484980";
$password = "HBL6BO_2LU";
$dbname = "Ramsin200484980";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
