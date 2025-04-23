<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arnie's</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/x-icon" href="images/fav.png">
    <script src="https://kit.fontawesome.com/45a59941b6.js" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
</head>

<body>

    <?php
    require 'header.php';
    require 'message.php';
    ?>

<section class="image-container">
    
        <img src="images/image1.jpg" alt="Image 1">
        <div class="overlay1">
            <h1>New <br>Collection</h1>
            <a href="shop.php" class="button1">Shop Now</a>
        </div>

</section>



    <section class="featured-products-unique">
        <div class="featured-header-unique">
            <h2><?php if (isset($_SESSION['Username'])) { ?>Hello, <?= $_SESSION['full_name'] ?><?php } ?></h2>
            <h2>Featured Products</h2>
            <a href="shop.php" class="view-all-unique">View All Products</a>
        </div>
        <div class="products-container-unique">
            <?php
            $s_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 4";
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
                        echo "<form class='product'>
                        <img src='images/$images' alt='$pro_title'>
                        <h3>$pro_title</h3>
                        <p>$price</p>
                        <a class='add-to-cart-btn' href='controllers/cart/add_to_cart.php?product_id=$pro_ID'>Add to Cart</a>
                    </form>";
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

    <section class="brand-logos-unique">
        <div class="container">
            <h2>Our Brands</h2>
            <div class="logo-container">
                <img src="images/brand1.png" alt="Brand 1">
                <img src="images/brand2.png" alt="Brand 2">
                <img src="images/brand3.png" alt="Brand 3">
                <img src="images/brand4.png" alt="Brand 3">
                <img src="images/brand5.png" alt="Brand 3">
                <img src="images/brand6.png" alt="Brand 3">
            </div>
        </div>
    </section>

    <!-- <section class="featured-products-unique">
        <div class="featured-header-unique">
            <h2>Featured Products</h2>
            <a href="shop.php" class="view-all-unique">View All Products</a>
        </div>
        <div class="products-container-unique"
            <?php
            $s_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 4";
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
                        //     echo "<div class='product'>
                        //     <img src='images/$images' alt='$pro_title'>
                        //     <h3>$pro_title</h3>
                        //     <p>$price</p>
                        //     <button class='add-to-cart-btn' data-Product_ID='$pro_ID'>Add to Cart</button>
                        // </div>";
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
    </section> -->

    <!-- <section class="categories-unique"> -->

    <div class="container">
    <h2>Categories</h2>
    <section class="manual-slideshow">
        <div class="slide active-slide">
            <img src="images/sneakers.png" alt="Sneakers">
            <div class="overlay">
                <h1>Sneakers</h1>
                <a href="shop.php" class="button">Shop Now</a>
            </div>
        </div>
        <div class="slide">
            <img src="images/boot.png" alt="Image 2">
            <div class="overlay">
                <h1>Formals</h1>
                <a href="shop.php" class="button">Shop Now</a>
            </div>
        </div>
        <div class="slide">
            <img src="images/athletic.png" alt="Image 3">
            <div class="overlay">
                <h1>Athletic</h1>
                <a href="shop.php" class="button">Shop Now</a>
            </div>
        </div>
        <div class="slide">
            <img src="images/everyday.png" alt="Image 4">
            <div class="overlay">
                <h1>Everyday</h1>
                <a href="shop.php" class="button">Shop Now</a>
            </div>
        </div>
        <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="next" onclick="changeSlide(1)">&#10095;</button>
    </section>
</div>


    <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
    <button class="next" onclick="changeSlide(1)">&#10095;</button>
</section>

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