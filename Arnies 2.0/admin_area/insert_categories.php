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

    $sql="INSERT INTO `categories` (`Category_title`) VALUES ('$name')";

    if($conn->query($sql) === TRUE){
        echo "New record created successfully";
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Categories</title>
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
        <h1>Insert Categories</h1> 
    <form class="ins_cat" action="insert_categories.php" method="post">
        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name">
        <br>
        <input type="submit" name="insert" value="Submit">
    </form>

        
    </div>    
</body>
</html>


