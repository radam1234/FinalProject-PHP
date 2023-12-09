<?php
// Start the session
session_start();

// Check if the user is already logged in, redirect to tasks page
if (isset($_SESSION['user_id'])) {
    header("Location: tasks.php");
    exit();
}

// Check if the form is submitted using POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // For demo purposes, checking if the username is 'demo' and the password is 'password'
    if ($username === 'demo' && $password === 'password') {
        // Set session variables to simulate a successful login
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = $username;

        // Redirect to the tasks page after successful login
        header("Location: tasks.php");
        exit();
    } else {
        // Set an error message if login credentials are incorrect
        $_SESSION['error_message'] = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
<h2>Login</h2>

<?php if (isset($_SESSION['error_message'])) : ?>
    <div class="error"><?php echo $_SESSION['error_message']; ?></div>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>
</body>

</html>
