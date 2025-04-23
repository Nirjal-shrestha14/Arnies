

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Brand List</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="admin.js"></script>
<link rel="icon" type="image/x-icon" href="../images/fav.png">
</head>
<body><div class="navbar">
    <div class="navbar-logo">
    <a href="index.php"><img src="arnies-logo-white.PNG" alt="Logo"></a>
    </div>
    <div class="navbar-text">Dashboard</div>
</div>
<?php include 'nav.php'; ?>
<table class="brand-table">
    <thead>
        <tr>
            <th>Brand ID</th>
            <th>Brand Title</th>
            <th>Brand Description</th>
        </tr>
    </thead>
    <tbody>
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

        $sql = "SELECT * FROM brands";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Brand_ID"] . "</td>";
                echo "<td>" . $row["Brand_title"] . "</td>";
                echo "<td>" . $row["Description"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>0 results</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
