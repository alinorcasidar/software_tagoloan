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
            <h1>Previous Projects</h1>
            
            <div class="project-grid">
            <?php 

                // Query to fetch events data from the database
                $sql = "SELECT id, name, pictures, event_date FROM Events";
                $result = $conn->query($sql);

                // Check if any results were returned
                if ($result->num_rows > 0) {
                // Loop through each event and display it
                while ($row = $result->fetch_assoc()) {
                // HTML structure for displaying each event
                echo '
                <div onclick="location=`project.php?id=' . $row['id'] . '`" class="grid-container">
                <div class="greyed">
                    <img src="' . $row['pictures'] . '" alt="Image">
                    <h3>' . $row['event_date'] . '</h3>
                </div>
                <h3>' . $row['name'] . '</h3>
                </div>';
                }
                } else {
                // If no events found
                echo '<p>No events found.</p>';
                }

                // Close the connection
                $conn->close();
                ?>
                <div class="grid-container">
                    <div onclick="location='add_project.php'" class="greyed plus" style="height: 100%; padding-top: 50px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg>
                    <h3>Add new Project</h3>
                </div>
            </div>
        </div>
    </div>
</body>
</html>