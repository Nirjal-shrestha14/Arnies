<?php
$_SERVER = "localhost";
$username = "root";
$password = "";
$db_name = "arnies";

// Create connection
$conn = new mysqli($_SERVER, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['insert'])){
// Retrieve the brand information from the form
$name = $_POST['name'];
$description = $_POST['description'];

// Prepare an SQL statement to insert the brand
$sql = "INSERT INTO brands (Brand_title, Description) VALUES ('$name', '$description')";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Brands</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="../images/fav.png">
    <script src="admin.js"></script>
</head>
<body>
<div class="navbar">
    <div class="navbar-logo">
    <a href="index.php"><img src="arnies-logo-white.PNG" alt="Logo"></a>
    </div>
    <div class="navbar-text">Dashboard</div>
</div>
  <?php include 'nav.php'; ?>
</div>
    <div class="admin-form">
    <h1>Insert Brands</h1> 
    <form class="ins_cat" action="insert_brands.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>
    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea><br><br>
    <input type="submit"name="insert" value="Submit">
    </form>
    </div>    
</body>
</html>

