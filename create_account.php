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
                <form action="controller/register.php" method="post">
                    <h2>Create Accpunt</h2>
                    <!-- First Name -->
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>

                    <!-- Last Name -->
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>

                    <!-- Email Address -->
                    <input type="email" id="email_address" name="email_address" placeholder="Email Address" required>

                    <!-- Phone Number -->
                    <input type="tel" id="phone_number" name="phone_number" placeholder="Phone Number">

                    <!-- Password -->
                    <input type="password" id="password" name="password" placeholder="Password" required>

                    <!-- Birthday -->
                    <input type="date" id="birthday" name="birthday">

                    <!-- Gender -->
                    <select id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="submit" class="button" value="Create Account">
                </form>
            </div>
        </div>
    </div>
</body>
</html>