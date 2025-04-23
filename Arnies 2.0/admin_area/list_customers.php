<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer List</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="admin.js"></script>
<link rel="icon" type="image/x-icon" href="../images/fav.png">
</head>
<body>
<div class="navbar">
    <div class="navbar-logo">
    <a href="index.php"><img src="arnies-logo-white.PNG" alt="Logo"></a>
    </div>
    <div class="navbar-text">Dashboard</div>
</div>
<?php include 'nav.php'; ?>
<div class="customer-table-container">
    <h2>Customer List</h2>
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

    // SQL query to retrieve all customers
    $sql = "SELECT * FROM customer";
    $result = $conn->query($sql);

    // Check if there are any customers
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table class='customer-table'>";
        echo "<tr><th>Cust_ID</th><th>Name</th><th>Gender</th><th>Phone</th><th>Email</th><th>Username</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Cust_ID"]. "</td>";
            echo "<td>" . $row["Name"]. "</td>";
            echo "<td>" . $row["Gender"]. "</td>";
            echo "<td>" . $row["Phone Number"]. "</td>";
            echo "<td>" . $row["Email"]. "</td>";
            echo "<td>" . $row["Username"]. "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No customers found";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
