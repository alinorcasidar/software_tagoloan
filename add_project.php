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
            <h3>Municipality of</h3>
            <h1>TAGOLOAN</h1>
        </div>
        <div class="two-col cards">
        <div class="card">
            <h2>Add Project</h2>
            <form action="controller/add_event.php" method="post" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Project Name" required>
                <input type="date" name="event_date" placeholder="Project Date" required>
                <textarea name="description" placeholder="Project Description" style="height: 300px" required></textarea>
                <input type="file" name="pictures" accept="image/*" required>
                <input type="submit" class="button" value="Add Project">
            </form>
        </div>
        </div>
    </div>
</body>
</html>