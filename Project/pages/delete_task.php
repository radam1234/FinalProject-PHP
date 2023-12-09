<?php
include 'db.php';
include 'functions.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $user_id = $_SESSION['user_id'];
    $task_id = $_GET['id'];

    // Fetch task details for the specified task ID
    $task = getTaskById($user_id, $task_id);

    if (!$task) {
        $_SESSION['error_message'] = "Task not found.";
        header("Location: index.php");
        exit();
    }

    // Delete the task from the database
    $result = deleteTask($user_id, $task_id);

    if ($result) {
        $_SESSION['success_message'] = "Task deleted successfully.";
    } else {
        $_SESSION['error_message'] = "Error deleting task. Please try again.";
    }
}

header("Location: index.php");
exit();
?>
