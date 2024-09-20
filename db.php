<?php

// Start session
session_start();

// Database connection using default XAMPP credentials
$servername = "localhost";
$username = "root";
$password = ""; // Default is no password in XAMPP
$dbname = "pm_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


require_once 'middleware.php';

