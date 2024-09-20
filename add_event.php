<?php
require_once 'db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $event_date = $_POST['event_date'];
    $description = $_POST['description'];
    
    // Handle image upload
    $target_dir = "../assets/img/"; // Ensure this directory is writable
    $target_file = $target_dir . basename($_FILES["pictures"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["pictures"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (limit to 2MB)
    if ($_FILES["pictures"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload the file
        if (move_uploaded_file($_FILES["pictures"]["tmp_name"], $target_file)) {
            // Prepare and bind

            $target_dir = "assets/img/"; // Ensure this directory is writable
            $target_file = $target_dir . basename($_FILES["pictures"]["name"]);
    
            $stmt = $conn->prepare("INSERT INTO Events (name, pictures, description, event_date, date_added) VALUES (?, ?, ?, ?, NOW())");
            $stmt->bind_param("ssss", $name, $target_file, $description, $event_date);

            // Execute the statement
            if ($stmt->execute()) {
                echo "New event added successfully.";
                header('Location: ../projects.php?success');
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Close the connection
$conn->close();
?>