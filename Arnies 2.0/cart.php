<?php
require 'config.php';
if (!isset($_SESSION['Username'])) {
    $_SESSION['error'] = 'You must be logged in to view cart.';
    header('Location: index.php');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="images/fav.png">
</head>

<body>
    <?php
    require 'header.php';
    require 'message.php';

    $cart_total = 0;

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $cart_items = '';

        foreach ($cart as $product_id => $quantity) {
            // Retrieve product details from the database
            $query = "SELECT * FROM products WHERE Product_ID = $product_id";
            $result = mysqli_query($conn, $query);
            $product = mysqli_fetch_assoc($result);

            if ($product) {
                $price = floatval($product['Price']); // Convert to float
                $product_title = $product['Product_title'];
                $total = $price * $quantity; // Perform multiplication
                $cart_total += $total;

                $cart_items .= "<tr class='cart-item-unique'>
                    <td><input type='checkbox' class='select-item-unique' checked></td>
                    <td>{$product_title}</td>
                    <td><input type='number' value='{$quantity}' min='1' class='quantity-input-unique'></td>
                    <td class='price-unique'>Rs. " . $price . "</td>
                    <td class='total-unique'>Rs. " . $total . "</td>
                </tr>";
            }
        }
    } else {
        $cart_items = "<tr><td colspan='5'>Your cart is empty.</td></tr>";
    }
    ?>
    <section class="cart-section-unique">
        <h2>Shopping Cart</h2>
        <table class="cart-table-unique">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody id="cart-items-unique">
                <?php echo $cart_items; ?>
            </tbody>
        </table>
        <div class="cart-total-unique">
            <h3>Total: Rs. <span id="cart-total-unique"><?php echo number_format($cart_total, 2); ?></span></h3>
        </div>
        <button class="checkout-button-unique"><a href="controllers/cart/checkout.php">Checkout</a></button>
    </section>

    <script src="cart.js"></script>
</body>

</html>