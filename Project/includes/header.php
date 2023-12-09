<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Task Manager</title>
</head>

<body>
<!-- Header section with navigation, logo, and user section -->
<header>
    <nav>
        <!-- Navigation links -->
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="tasks.php">Tasks</a></li>
        </ul>
    </nav>
    <!-- Logo section -->
    <div class="logo">
        <!-- Logo linking to the home page -->
        <a href="index.php">Task Manager</a>
    </div>
    <!-- User section, displaying user information or login/register links -->
    <div class="user-section">
        <?php
        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            // Display welcome message and logout link
            echo '<span>Welcome, ' . $_SESSION['username'] . '!</span>';
            echo '<a href="logout.php">Logout</a>';
        } else {
            // Display login and register links
            echo '<a href="login.php">Login</a>';
            echo '<a href="register.php">Register</a>';
        }
        ?>
    </div>
</header>
