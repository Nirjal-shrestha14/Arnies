<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="images/fav.png">
</head>

<body>
    <?php
    require 'header.php';
    require 'message.php';
    ?>

    <section class="shop-products-unique">
        <h2>Shop Products</h2>
        <div class="products-grid-unique">
            <?php
            $s_query = "SELECT * FROM `products`";
            $r_query = mysqli_query($conn, $s_query);

            if ($r_query) {
                // Check if there are any rows returned
                if (mysqli_num_rows($r_query) > 0) {
                    while ($row = mysqli_fetch_assoc($r_query)) {
                        // Process each row here
                        $pro_ID = $row['Product_ID'];
                        $pro_title = $row['Product_title'];
                        $desc = $row['Description'];
                        $price = $row['Price'];
                        $images = $row['Image'];
                        $brand_ID = $row['Brand_ID'];
                        $cate_ID = $row['Category_ID'];

                        // Output HTML for each product
                        echo "<div class='product'>
                        <img src='images/$images' alt='$pro_title'>
                        <h3>$pro_title</h3>
                        <p>Rs.$price</p>
                        <a class='add-to-cart-btn' href='controllers/cart/add_to_cart.php?product_id=$pro_ID'>Add to Cart</a>
                    </div>";
                    }
                } else {
                    echo "No products found.";
                }
            } else {
                // Handle query execution error
                echo "Error executing query: " . mysqli_error($conn);
            }
            ?>
        </div>
    </section>

    <?php require 'footer.php'; ?>

    <script>
        $('.add-to-cart-btn').on('click', function () {
            var productId = $(this).data('Product_id');
            var customerId = <?php echo $_SESSION['Cust_ID']; ?>;

            $.ajax({
                url: 'cart.php',
                method: 'POST',
                data: { Product_ID: productId, Cust_ID: customerId },
                success: function (response) {
                    alert(response);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>

</body>

</html>