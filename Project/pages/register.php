<?php
// Include necessary files and start session if needed
include 'includes/db.php';
include 'includes/functions.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Validate input (perform additional validation based on your requirements)
    if (empty($username) || empty($email) || empty($_POST['password'])) {
        $_SESSION['error_message'] = "Please fill in all fields.";
        header("Location: register.php");
        exit();
    }

    // Check if the email is already registered
    if (emailExists($email)) {
        $_SESSION['error_message'] = "Email address already registered.";
        header("Location: register.php");
        exit();
    }

    // Create the new user
    $result = createUser($username, $email, $password);

    if ($result) {
        $_SESSION['success_message'] = "Registration successful. You can now log in.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Error creating user. Please try again.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Register</h2>

    <?php if (isset($_SESSION['error_message'])) : ?>
        <div class="error"><?php echo $_SESSION['error_message']; ?></div>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>

    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Register</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
</body>

</html>
