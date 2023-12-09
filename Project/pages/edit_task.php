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
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $due_date = $_POST['due_date'];
    $description = $_POST['description'];

    // Validate input (perform additional validation based on your requirements)
    if (empty($task_name) || empty($due_date) || empty($description)) {
        $_SESSION['error_message'] = "Please fill in all fields.";
        header("Location: edit_task.php?id=$task_id");
        exit();
    }

    // Update the task in the database
    $result = updateTask($user_id, $task_id, $task_name, $due_date, $description);

    if ($result) {
        $_SESSION['success_message'] = "Task updated successfully.";
    } else {
        $_SESSION['error_message'] = "Error updating task. Please try again.";
    }

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include your head content, such as title and styles -->
</head>

<body>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Edit Task</h2>

    <?php if (isset($_SESSION['error_message'])) : ?>
        <div class="error"><?php echo $_SESSION['error_message']; ?></div>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>

    <form action="edit_task.php" method="post">
        <input type="hidden" name="task_id" value="<?php echo $task['task_id']; ?>">
        <label for="task_name">Task Name:</label>
        <input type="text" name="task_name" value="<?php echo $task['task_name']; ?>" required>

        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" value="<?php echo $task['due_date']; ?>" required>

        <label for="description">Description:</label>
        <textarea name="description" rows="4" required><?php echo $task['description']; ?></textarea>

        <button type="submit">Save Changes</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
</body>

</html>
