<?php
require '../../config.php';
if (!isset($_SESSION['Username'])) {
    $_SESSION['error'] = '1';
    header('Location: ../../login.php');
    die;
}
echo 'You can add to cart now';

if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']); 

    // Initialize cart if not already set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add product to cart
    if (array_key_exists($product_id, $_SESSION['cart'])) {
        // Product already in cart, increment quantity
        $_SESSION['cart'][$product_id]++;
    } else {
        // Product not in cart, add with quantity 1
        $_SESSION['cart'][$product_id] = 1;
    }

    // Redirect back to the previous page or to a specific page
    $previous_page = $_SERVER['HTTP_REFERER'];
    $_SESSION['success'] = 'Added to cart successfully!';
    header("Location: $previous_page");
    exit();
} else {
    // Handle the case where product_id is not set
    echo "Invalid product.";
}