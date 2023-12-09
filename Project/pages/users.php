<?php
include 'includes/db.php';
include 'includes/functions.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$users = getAllUsers();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Registered Users</h2>

    <?php if ($users) : ?>
        <ul>
            <?php foreach ($users as $user) : ?>
                <li>
                    <strong><?php echo $user['username']; ?></strong>
                    <p>Email: <?php echo $user['email']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>No registered users found.</p>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
</body>

</html>
