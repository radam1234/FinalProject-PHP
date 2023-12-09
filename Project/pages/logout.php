<?php
// Start the session
session_start();

// Destroy the current session which logs the user out
session_destroy();

// Redirect the user to the login page after logout
header("Location: login.php");
exit();
?>
