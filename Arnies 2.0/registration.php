<?php
    require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="images/fav.png">
</head>
<body>
    <?php 
    require 'header.php'; ?>

    <section class="registration-unique">
        <h2>Register</h2>
        <form class="registration-form-unique" action="register_logic.php" method="POST">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required>
                
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                
                <button type="submit">Register</button><br><br>

                <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </section>
</body>
</html>
