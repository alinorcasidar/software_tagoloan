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
            <?php 

            // Fetch the event ID from the query string (assuming URL has ?id=event_id)
            $event_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

            // Fetch event data by ID from the database
            $sql = "SELECT name, pictures, description, event_date FROM Events WHERE id = $event_id";
            $result = $conn->query($sql);

            // Check if the event was found
            if ($result->num_rows > 0) {
                $event = $result->fetch_assoc(); // Fetch event details
                ?>
                
                <div class="project-solo-container">
                    <h1 class="center"><?php echo $event['name']; ?></h1>
                    
                    <img src="<?php echo $event['pictures']; ?>" alt="Event Image">

                    <p><?php echo $event['description']; ?></p>
                </div>

                <?php
            } else {
                // If no event is found, display a message
                echo "<p>Event not found.</p>";
            }

            // Close the connection
            $conn->close();
            ?> 
        </div>
    </div>
</body>
</html>