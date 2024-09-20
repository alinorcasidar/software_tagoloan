<?php

require_once 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $date = $_POST['date'];
    $event = $_POST['event'];
    $location = $_POST['location'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Reminders (date, event, location, date_added) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("sss", $date, $event, $location);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New reminder added successfully.";
        header('Location: ../planner.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
