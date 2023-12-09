<?php
include 'database.php';
include 'functions.php';
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$tasks = getUserTasks($user_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
<?php include 'includes/header.php'; ?>

<div class="container">
    <!-- Welcome message -->
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>

    <!-- Display success message if any -->
    <?php if (isset($_SESSION['success_message'])) : ?>
        <div class="success"><?php echo $_SESSION['success_message']; ?></div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <!-- Display error message if any -->
    <?php if (isset($_SESSION['error_message'])) : ?>
        <div class="error"><?php echo $_SESSION['error_message']; ?></div>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>

    <!-- Display user's tasks -->
    <h3>Your Tasks:</h3>
    <ul>
        <?php foreach ($tasks as $task) : ?>
            <li>
                <strong><?php echo $task['task_name']; ?></strong>
                <p>Due Date: <?php echo $task['due_date']; ?></p>
                <p><?php echo $task['description']; ?></p>
                <a href="view_task.php?id=<?php echo $task['task_id']; ?>">View Details</a>
                <a href="edit_task.php?id=<?php echo $task['task_id']; ?>">Edit</a>
                <a href="delete_task.php?id=<?php echo $task['task_id']; ?>">Delete</a>
                <input type="checkbox" name="completed" <?php echo ($task['completed'] ? 'checked' : ''); ?>>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Form to add a new task -->
    <h3>Add New Task:</h3>
    <form action="add_task.php" method="post">
        <label for="task_name">Task Name:</label>
        <input type="text" name="task_name" required>

        <label for="due_date">Due Date:</label>
        <input type="date" name="due_date" required>

        <label for="description">Description:</label>
        <textarea name="description" rows="4" required></textarea>

        <button type="submit">Add Task</button>
    </form>

    <!-- Form to logout -->
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</div>

<!-- Logo -->
<div class="logo">
    <img src="../img/logo.png" alt="Logo">
</div>

<!-- Banner Image (Optional) -->
<div class="banner-image">
    <img src="../img/woman.jpg" alt="Banner Image">
</div>

<!-- Background Image -->
<div class="background-image">
    <img src="../img/pexels-mikhail-nilov-8296981.jpg" alt="Background Image">
</div>

<!-- Task Category Icons -->
<div class="task-category-icons">
    <img src="../img/icon1.png" alt="Task Category Icon 1">
    <img src="../img/icon2.png" alt="Task Category Icon 2">
    <img src="../img/icon3.png" alt="Task Category Icon 3">
</div>

<?php include 'footer.php'; ?>
</body>

</html>
