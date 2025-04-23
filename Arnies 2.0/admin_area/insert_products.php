<?php
$_SERVER = "localhost";
$username = "root";
$password = "";
$db_name = "arnies";

$conn = mysqli_connect($_SERVER, $username, $password, $db_name);

if(!$conn){
     die("connection to this database failed due to " . mysqli_connect_error());
 }

 if(isset($_POST['insert'])){

 $name = $_POST['name'];
 $description = $_POST['description'];
 $price = $_POST['price'];
 $image = $_POST['image'];
 $product_category = $_POST['product_category'];
 $product_brand = $_POST['product_brand'];

$temp_image = $_POST['image'];

 if($image==''){
    echo"<script>alert('Please insert an Image')</script>";
    exit(); 
 }else{
    move_uploaded_file($temp_image,"./images/$image");

    $sql="INSERT INTO `products` (`Product_title`, `Description`, `Price`, `Image`,`Brand_ID`,`Category_ID`) 
    VALUES ('$name', '$description', '$price', '$image','$product_category','$product_brand')";


 if($conn->query($sql) == TRUE){
     echo "Product added successfully";
 }
 else{
     echo"ERROR: $sql <br> $conn->error";
 }
 }
}
// $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
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
</div>
    <div class="admin-form">
        <h1>Insert Products</h1> 
        <form action="insert_products.php" method="post" enctype="multipath/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" required><br><br>
        
                <label for="description">Product Description:</label>
                <textarea id="description" name="description" required></textarea><br><br>
        
                <label for="price">Product Price:</label>
                <input type="text" id="price" name="price" required><br><br>
        
                <label for="image">Product Image URL:</label>
                <input type="file" id="image" name="image" required><br><br>
        
                <div><select id="" name="product_category" required>
                    <option value="">Select a Category</option>
                    <?php
                        $s_query="Select * from `categories`";
                        $r_query=mysqli_query($conn,$s_query);
                        while($row=mysqli_fetch_assoc($r_query)){
                            $category_title=$row['Category_title'];
                            $category_ID=$row['Category_ID'];
                            echo"<option value='$category_ID'>$category_title</option>";
                        }
                    ?>
                </select></div>

                <div><select id="" name="product_brand" required>
                    <option value="">Select a brand</option>
                    <?php
                        $s_query="Select * from `brands`";
                        $r_query=mysqli_query($conn,$s_query);
                        while($row=mysqli_fetch_assoc($r_query)){
                            $brand_title=$row['Brand_title'];
                            $brand_ID=$row['Brand_ID'];
                            echo"<option value='$brand_ID'>$brand_title</option>";
                        }
                    ?>
                </select></div>

                <input type="submit" name="insert" value="Add Product">
            </div>    
        </form>
    </div>    
</body>
</html>