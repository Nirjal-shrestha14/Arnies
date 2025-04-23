<?php
require 'config.php';
if (isset($_SESSION['Username'])) {
  header('Location: index.php');
  die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/x-icon" href="images/fav.png">
</head>

<body>
  <?php include 'header.php'; ?>

  <section class="login-unique">
    <h2>Login</h2>
    <form class="login-form-unique" action="controllers/auth/login.php" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <input type="submit" value="Login" /><br><br>

      <p>Don't have an account? <a href="registration.php">Register here</a></p>
    </form>
  </section>
</body>

<?php
if (isset($_SESSION['error'])) {
  echo '<script>alert("You must login first")</script>';
  $_SESSION['error'] = null;
}

?>

</html>