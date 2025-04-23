<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders List</title>
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

    <div class="orders-table-container">
        <h2>Orders List</h2>
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require '../config.php';

                // Prepare an SQL statement to select all orders
                $sql = "SELECT o.*, c.Name FROM orders o LEFT JOIN customer c ON o.Cust_ID = c.Cust_ID;";

                // Execute the SQL statement
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        // print_r($row);
                        echo "<tr>";
                        echo "<td>" . $row["Order_ID"] . "</td>";
                        echo "<td>" . $row["Name"] . "</td>";
                        echo "<td>" . $row["Order_Date"] . "</td>";
                        echo "<td>" . $row["Total_Price"] . "</td>";
                        echo "<td><a href='order_detail.php?Order_ID={$row['Order_ID']}'>Order Details</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>0 results</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>