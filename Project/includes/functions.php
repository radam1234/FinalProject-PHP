<?php
include 'database.php';

// Function to create a new user in the database
function createUser($username, $email, $password) {
    global $conn;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
    return mysqli_query($conn, $query);
}

// Function to get user details by user ID
function getUserById($user_id) {
    global $conn;
    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

// Function to check if an email already exists in the database
function emailExists($email) {
    global $conn;
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0;
}

// Function to get details of all users in the database
function getAllUsers() {
    global $conn;
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    return $users;
}

// Function to update user details in the database
function updateUser($user_id, $username, $email) {
    global $conn;
    $query = "UPDATE users SET username = '$username', email = '$email' WHERE user_id = $user_id";
    return mysqli_query($conn, $query);
}

// Function to delete a user from the database
function deleteUser($user_id) {
    global $conn;
    $query = "DELETE FROM users WHERE user_id = $user_id";
    return mysqli_query($conn, $query);
}
?>
