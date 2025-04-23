<?php
require '../../config.php';

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $cust_id = intval($_SESSION['cust_id']);

    // Begin transaction
    mysqli_begin_transaction($conn);

    try {
        // Insert order details into the orders table
        $order_date = date('Y-m-d H:i:s');
        $query = "INSERT INTO orders (Cust_ID, Order_Date, Total_Price) VALUES ($cust_id, '$order_date', 0)";
        mysqli_query($conn, $query);
        $order_id = mysqli_insert_id($conn);

        // Calculate total price and insert each cart item into order_products table
        $order_total = 0;
        foreach ($cart as $product_id => $quantity) {
            print_r($quantity);
            $query = "SELECT Price FROM products WHERE Product_ID = $product_id";
             $result = mysqli_query($conn, $query);
             $product = mysqli_fetch_assoc($result);

             if ($product) {
                 $price = floatval($product['Price']);
                 $total = $price * $quantity;
                 $order_total += $total;

                 $query = "INSERT INTO order_products (Order_ID, Product_ID, Quantity) VALUES ($order_id, $product_id, $quantity)";
                 mysqli_query($conn, $query);
             }
        }

        // Update total price in the orders table
        $query = "UPDATE orders SET Total_Price = $order_total WHERE Order_ID = $order_id";
        mysqli_query($conn, $query);

        // Commit transaction
        mysqli_commit($conn);

        // Clear cart
        unset($_SESSION['cart']);

        // Redirect to a confirmation page
        header('Location: ../../order_confirmation.php?order_id=' . $order_id);
        exit();
    } catch (Exception $e) {
        // Rollback transaction in case of an error
        mysqli_rollback($conn);
        echo "Error: " . $e->getMessage();
    }
} else {
    header('Location: cart.php');
    exit();
}
?>