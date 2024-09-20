<?php

require_once 'db.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $email_address = $conn->real_escape_string($_POST['email_address']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT); // Hash password
    $birthday = $conn->real_escape_string($_POST['birthday']);
    $gender = $conn->real_escape_string($_POST['gender']);

    // Set default values for user_type and isVerified
    $user_type = 'authorized'; // Default value
    $isVerified = 0; // Default value (false)

    // SQL query to insert data into Users table
    $sql = "INSERT INTO Users (first_name, last_name, email_address, phone_number, password, birthday, gender, user_type, isVerified, date_added) 
            VALUES ('$first_name', '$last_name', '$email_address', '$phone_number', '$password', '$birthday', '$gender', '$user_type', '$isVerified', NOW())";

    // Execute query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header('Location: ../login.php?success');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

// Close the connection
$conn->close();
?>
s