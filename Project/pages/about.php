<?php
// Include necessary files and start session if needed
include 'database.php';
include 'functions.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Task Manager</title>
    <!-- Include your stylesheets or link to external stylesheets here -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<?php include 'header.php'; ?>

<div class="container">
    <h2>About Task Manager</h2>
    <p>
        Welcome to our Task Manager! We understand the importance of staying organized and
        managing your tasks efficiently. Our task manager provides you with a simple and effective
        way to keep track of your to-do list, set priorities, and achieve your goals.
    </p>

    <p>
        Key Features:
    </p>
    <ul>
        <li>Create, edit, and delete tasks</li>
        <li>Set due dates and priorities</li>
        <li>Organize tasks into categories or projects</li>
        <li>Collaborate with team members (if applicable)</li>
        <li>View a personalized dashboard with task insights</li>
    </ul>

    <p>
        Whether you're a professional managing work tasks or an individual keeping track of personal
        responsibilities, our task manager is designed to streamline your workflow and enhance your productivity.
    </p>

    <p>
        Get started today and take control of your tasks. If you have any feedback or questions, feel free
        to reach out to us. We're here to help you make the most of your task management experience.
    </p>


</div>

<?php
include 'footer.php';
?>
</body>

</html>