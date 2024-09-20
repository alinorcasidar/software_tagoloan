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
        <div class="two-col context">
            <div class="rem-cont">
                <div class="reminder-container">
                    <div class="reminder-lists">
                        <ul>
                            <?php

                            // Fetch reminders from the database
                            $sql = "SELECT date, event, location FROM Reminders ORDER BY date DESC"; // Change ordering if needed
                            $result = $conn->query($sql);

                            // Check if there are results and display them
                            if ($result->num_rows > 0) {
                                // Output data for each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<li>";
                                    echo "DATE: " . date("M d, Y", strtotime($row['date'])) . ", <br>"; // Format date
                                    echo "Program: " . htmlspecialchars($row['event']) . " <br>"; // Escape output
                                    echo "Location: " . htmlspecialchars($row['location']);
                                    echo "</li>";
                                }
                            } else {
                                echo "<li>No reminders found.</li>";
                            }

                            // Close the connection
                            $conn->close();
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="two-col cards">
        <div class="card">
            <h2>Add Reminders</h2>
            <form action="controller/add_reminder.php" method="post">
                <input type="date" name="date" placeholder="Reminder Date" required>
                <input type="text" name="event" placeholder="Event Description" required>
                <input type="text" name="location" placeholder="Location" required>
                <input type="submit" class="button" value="Add Reminder">
            </form>
        </div>
        </div>
    </div>
</body>
</html>