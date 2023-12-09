<?php
include 'db.php';
include 'functions.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $task_name = $_POST['task_name'];
    $due_date = $_POST['due_date'];
    $description = $_POST['description'];

    // Validate input (perform additional validation based on your requirements)
    if (empty($task_name) || empty($due_date) || empty($description)) {
        $_SESSION['error_message'] = "Please fill in all fields.";
        header("Location: index.php");
        exit();
    }

    // Add the task to the database
    $result = addTask($user_id, $task_name, $due_date, $description);

    if ($result) {
        $_SESSION['success_message'] = "Task added successfully.";
    } else {
        $_SESSION['error_message'] = "Error adding task. Please try again.";
    }
}

header("Location: index.php");
exit();
?>
