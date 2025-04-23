<?php
require '../config.php';
if (!$_GET['Order_ID']) {
    header('Location: ./index.php');
    die;
}
$order_id = $_GET['Order_ID'];
$sql = "SELECT op.OrderProduct_ID, op.Order_ID, op.Product_ID, op.Quantity,
               o.Order_Date, o.Total_Price,
               p.Product_title, p.Price
        FROM order_products AS op
        LEFT JOIN orders AS o ON op.Order_ID = o.Order_ID
        LEFT JOIN products AS p ON op.Product_ID = p.Product_ID
        WHERE op.Order_ID = {$order_id}";
$result = mysqli_query($conn, $sql);
$a_sql = "SELECT o.*,c.Name,c.Email
FROM orders o
LEFT JOIN customer c ON o.Cust_ID = c.Cust_ID
WHERE o.Order_ID = {$order_id}";
$a_result = mysqli_query($conn, $a_sql);
$a_row = mysqli_fetch_assoc($a_result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Details - Order No.</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../images/fav.png">
</head>
<div class="navbar">
    <div class="navbar-logo">
    <a href="index.php"><img src="arnies-logo-white.PNG" alt="Logo"></a>
    </div>
    <div class="navbar-text">Dashboard</div>
</div>

<?php include 'nav.php'; ?>

<body>
    <h1>Order Details</h1>
    <p>Here are the details for the order:</p>
    <p>Order ID: <?php echo $order_id; ?></p>
    <p>Order Date: <?php echo $a_row['Order_Date']; ?></p>
    <p>Ordered by: <?php echo $a_row['Name']; ?></p>
    <p>Customer Email: <?php echo $a_row['Email']; ?></p>
    <h2>Order Details:</h2>
    <table class="brand-table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Rate</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $price = $row['Price'] * $row['Quantity'];
                echo '<tr>';
                echo '<td>' . $row['Product_ID'] . '</td>';
                echo '<td>' . $row['Product_title'] . '</td>';
                echo '<td>' . $row['Price'] . '</td>';
                echo '<td>' . $row['Quantity'] . '</td>';
                echo '<td>' . $price . '</td>';
                echo '</tr>';
                $total_price = $row['Total_Price'];
            }
            ?>
        </tbody>
    </table>
    <p>Total Amount: Rs. <?php echo number_format($total_price); ?></p>
</body>

</html>