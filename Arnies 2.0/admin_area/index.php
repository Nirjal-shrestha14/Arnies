<?php
require '../config.php';
if (!isset($_SESSION['admin'])) {
    $_SESSION['error'] = "You must be logged in as an administrator to access this page!";
    header('Location: ../index.php');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="admin.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/fav.png">
</head>

<body>

    <div class="navbar">
        <div class="navbar-logo">

            <a href="index.php"><img src="arnies-logo-white.PNG" alt="Logo"></a>

        </div>
        <div class="navbar-text">Admin Dashboard - Welcome, <?= $_SESSION['admin']; ?></div>
    </div>
    <br>
   <?php include 'nav.php'; ?>  

   

    <div class="dashboard">

        <a href="view_products.php" class="box">
            <div>
                <h2>Total Products</h2>
                <?php

                // Query to get total products
                $sql_products = "SELECT COUNT(*) AS total_products FROM products";
                $result_products = $conn->query($sql_products);
                $row_products = $result_products->fetch_assoc();
                $total_products = $row_products['total_products'];

                echo "<p>$total_products</p>";

                ?>
            </div>
        </a>

        <a href="view_categories.php" class="box">
            <div>
                <h2>Total Categories</h2>
                <?php
                // Query to get total customers
                $sql_categories = "SELECT COUNT(*) AS total_categories FROM categories";
                $result_categories = $conn->query($sql_categories);
                $row_categories = $result_categories->fetch_assoc();
                $total_categories = $row_categories['total_categories'];

                echo "<p>$total_categories</p>";
                ?>
            </div>
        </a>

        <a href="view_brands.php" class="box">
            <div>
                <h2>Total Brands</h2>
                <?php
                // Query to get total brands
                $sql_brands = "SELECT COUNT(*) AS total_brands FROM brands";
                $result_brands = $conn->query($sql_brands);
                $row_brands = $result_brands->fetch_assoc();
                $total_brands = $row_brands['total_brands'];

                echo "<p>$total_brands</p>";
                ?>
            </div>
        </a>

        <a href="all_orders.php" class="box">
            <div>
                <h2>Total Orders</h2>
                <?php
                // Query to get total orders
                $sql_orders = "SELECT COUNT(*) AS total_orders FROM orders";
                $result_orders = $conn->query($sql_orders);
                $row_orders = $result_orders->fetch_assoc();
                $total_orders = $row_orders['total_orders'];
                if ($total_orders != 0) {
                    echo "<p>$total_orders</p>";
                } else {
                    echo "<p>0</p>";
                }
                ?>
            </div>
        </a>

        <a href="list_customers.php" class="box">
            <div>
                <h2>Total Customers</h2>
                <?php
                // Query to get total customers
                $sql_customers = "SELECT COUNT(*) AS total_customers FROM customer";
                $result_customers = $conn->query($sql_customers);
                $row_customers = $result_customers->fetch_assoc();
                $total_customers = $row_customers['total_customers'];

                echo "<p>$total_customers</p>";

                $conn->close();
                ?>
            </div>
        </a>

    </div>
</body>

</html>