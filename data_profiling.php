<?php require_once 'controller/db.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software PIT</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap-icons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Old Standard TT' rel='stylesheet'>
</head>
<body>

<?php require_once 'component/navbar.php' ?>

    <div class="hero-page">
        <div class="two-col cards w-100 projects">
            <h2>Data profiling</h2> 

            <?php

            // Query to fetch all users from the Users table
            $sql = "SELECT id, first_name, last_name, email_address, phone_number, birthday, gender, user_type, isVerified, date_added FROM Users";
            $result = $conn->query($sql);

            // Check if there are any users in the table
            if ($result->num_rows > 0) {
                // Start building the HTML table
                echo '<table border="1">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>First Name</th>';
                echo '<th>Last Name</th>';
                echo '<th>Email Address</th>';
                echo '<th>Phone Number</th>';
                echo '<th>Birthday</th>';
                echo '<th>Gender</th>';
                echo '<th>User Type</th>';
                echo '<th>Is Verified</th>';
                echo '<th>Date Added</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['first_name'] . '</td>';
                    echo '<td>' . $row['last_name'] . '</td>';
                    echo '<td>' . $row['email_address'] . '</td>';
                    echo '<td>' . $row['phone_number'] . '</td>';
                    echo '<td>' . $row['birthday'] . '</td>';
                    echo '<td>' . $row['gender'] . '</td>';
                    echo '<td>' . $row['user_type'] . '</td>';
                    echo '<td>' . ($row['isVerified'] ? 'Yes' : 'No') . '</td>';
                    echo '<td>' . $row['date_added'] . '</td>';
                    echo '</tr>';
                }
                
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No users found.</p>';
            }

            // Close the connection
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>