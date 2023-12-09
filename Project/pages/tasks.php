<?php
session_start();

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
    <title>Task Manager - Tasks</title>
</head>

<body>
<h2>Welcome, <?php echo $_SESSION['username']; ?></h2>

<?php if (isset($_SESSION['success_message'])) : ?>
    <div class="success"><?php echo $_SESSION['success_message']; ?></div>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error_message'])) : ?>
    <div class="error"><?php echo $_SESSION['error_message']; ?></div>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

<h3>Your Tasks:</h3>

<ul>
    <?php foreach ($tasks as $task) : ?>
        <li>
            <strong><?php echo $task['task_name']; ?></strong>
            <p>Due Date: <?php echo $task['due_date']; ?></p>
            <p><?php echo $task['description']; ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<form action="logout.php" method="post">
    <button type="submit">Logout</button>
</form>
</body>

</html>
