<?php require_once 'controller/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software PIT</title>
    <link href="assets/css/style.css?v=<?= filemtime('assets/css/style.css'); ?>"rel="stylesheet"/>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/bootstrap-icons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Old Standard TT' rel='stylesheet'>
    <!-- Google Fonts: Old Standard TT -->

</head>
<body>
    <?php require_once 'component/navbar.php'; ?>

    <div class="hero-page">
        <div class="two-col context">
        <h3>MUNICIPALITY OF</h3>
            <h1 style="font-family: 'Old Standard TT'; font-weight: 700;">TAGOLOAN</h1>
            <p>Example: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque venenatis facilisis urna sed congue.</p>
            <a href="login.php" class="button">Signup/Login<br> 
            <span>(Authorized only)</span></a>
        </div>
        <div class="two-col imgs">
            <img style="height: 372px; width: 526px;" src="assets/img/sta_cruz_image.jpg" alt="Sta Cruz">
            <h2 style="height: 80px;width: 100%; background-color: rgb(167, 149, 125); font-size: 48px; color: white; font-family: 'Old Standard TT' !important; font-weight:lighter; text-align:center; padding: 10px;" >Brgy. Sta Cruz</h2>
        </div>
    </div>
</body>
</html>
