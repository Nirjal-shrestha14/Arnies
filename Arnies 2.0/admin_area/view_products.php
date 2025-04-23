<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Products</title>
    <link rel="stylesheet" href="styles.css">
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
    
    <table class="table-container" style="border: 1cap">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Description</th>
            <th>Product Price</th>
            <th>Product Image</th>
        </tr>

        <?php
        $_SERVER = "localhost";
        $username = "root";
        $password = "";
        $db_name = "arnies";

        $conn = mysqli_connect($_SERVER, $username, $password, $db_name);

        if(!$conn){
            die("connection to this database failed due to " . mysqli_connect_error());
        }

        $sql="SELECT * FROM `products`";

        $result=mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row['Product_ID'] . "</td>";
            echo "<td>" . $row['Product_title'] . "</td>";
            echo "<td>" . $row['Description'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td><img src='product_images/" . $row['Image'] . "' width='100' height='100'></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>