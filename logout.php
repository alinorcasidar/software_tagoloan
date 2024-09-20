<?php
// Start session
session_start();

// Destroy all session data
session_destroy();

// Optionally, you can clear session variables
$_SESSION = [];

// Redirect to the login page or home page
header("Location: index.php"); // Change this to your desired landing page
exit();
?>
