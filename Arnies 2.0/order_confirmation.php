<?php
require 'config.php';



if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);
    $query = "SELECT * FROM orders WHERE Order_ID = $order_id";
    $result = mysqli_query($conn, $query);
    $order = mysqli_fetch_assoc($result);

    // Fetch order products
    $query = "SELECT * FROM order_products WHERE Order_ID = $order_id";
    $items_result = mysqli_query($conn, $query);
}
?>
  <?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <h1>Order Confirmation</h1>
    <p>Thank you for your order!</p>
    <p>Order ID: <?php echo $order_id; ?></p>
    <p>Total Amount: Rs. <?php echo number_format($order['Total_Price'], 2); ?></p>

    <h2>Order Details:</h2>
    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($item = mysqli_fetch_assoc($items_result)) {
                $product_id = $item['Product_ID'];
                $quantity = $item['Quantity'];

                // Fetch product details
                $query = "SELECT Price FROM products WHERE Product_ID = $product_id";
                $product_result = mysqli_query($conn, $query);
                $product = mysqli_fetch_assoc($product_result);

                if ($product) {
                    $price = floatval($product['Price']);
                    $total = $price * $quantity;
                    ?>
                    <tr>
                        <td><?php echo $product_id; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td>Rs. <?php echo number_format($price, 2); ?></td>
                        <td>Rs. <?php echo number_format($total, 2); ?></td>
                    </tr>
                <?php }
            } ?>
        </tbody>
    </table>
</body>

</html>