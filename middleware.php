<?php

// Define the pages that can be accessed without being logged in
$public_pages = ['index.php', 'login.php', 'create_account.php'];

// Get the current page
$current_page = basename($_SERVER['PHP_SELF']);
$current_dir = dirname($_SERVER['PHP_SELF']);

// Debug: output current page and session status
// echo "<pre>"; // Preformatted text for better readability
// echo "Current Page: $current_page\n";
// echo "Session Variables:\n";
// var_dump($_SESSION); // Dump session variables for inspection
// echo "</pre>";

// Check if the user is logged in
$is_logged_in = isset($_SESSION['user_id']);
$is_verified = isset($_SESSION['isVerified']) && $_SESSION['isVerified'];

// Debugging output for login and verification status
// echo "<pre>";
// echo "Is Logged In: " . ($is_logged_in ? 'Yes' : 'No') . "\n";
// echo "Is Verified: " . ($is_verified ? 'Yes' : 'No') . "\n";
// echo "</pre>";

// Exclude access control for scripts in component and controller folders
if (str_contains($current_dir, '/component') || str_contains($current_dir, '/controller')) {
    return; // Allow access
}

// Logic to restrict access for other pages
if (!$is_logged_in) {
    // User is not logged in
    if (!in_array($current_page, $public_pages)) {
        header("Location: login.php?error=login first");
        exit();
    }
} else {
    // User is logged in
    if ($current_page === 'index.php') {
        // Redirect logged-in users trying to access index.php
        header("Location: notice.php");
        exit();
    }

    if (!$is_verified && $current_page !== 'notice.php') {
        // Redirect to notice.php if the user is logged in but not verified
        header("Location: notice.php");
        exit();
    }

    if ($is_verified && $current_page === 'notice.php') {
        // Redirect to notice.php if the user is logged in but not verified
        header("Location: data_profiling.php");
        exit();
    }
}

// If the user is either logged in and verified or accessing a public page, allow access
?>
