<?php
require '../../config.php';
if (isset($_POST['username'])) {

    $uname = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE `Username`='$uname' AND `Password` ='$pass'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $_SESSION['admin'] = $row['Username'];
        header("Location: ../../admin_area/index.php");
        die;
    }

    $sql = "SELECT * FROM `customer` WHERE `Username`='$uname' AND `Password` ='$pass'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $_SESSION['cust_id'] = $row['Cust_ID'];
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['full_name'] = $row['Name'];
        header("Location: ../../index.php");
        die;
    } else {
        echo "<script>alert('Username or password does not match. Please try again.');</script>";
    }
}
