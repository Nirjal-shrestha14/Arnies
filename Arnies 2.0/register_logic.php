<?php
if(isset($_POST['fullname'])){
     
    require 'config.php';

    $gender = $_POST['gender'];
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $uname = $_POST['username'];
    $phone = $_POST['phone'];
    $confirmPass = $_POST['confirm_password'];
    $pass = $_POST['password'];

    if ($pass != $confirmPass) {
      echo "<script>alert('Passwords do not match. Please try again.');</script>";
    exit();
    }

    $sql="SELECT * FROM `customer` WHERE `Username`='$uname'";

    $result=mysqli_query($conn, $sql);

    $num=mysqli_num_rows($result);

    if($num == 1){
      echo 
      "<script>alert('Username already exists. Please try again.');
      window.location.href = 'registration.php';
  </script>";
      exit();
    }

    $sql="SELECT * FROM `customer` WHERE `Email`='$email'";

    $result=mysqli_query($conn, $sql);

    $num=mysqli_num_rows($result);

    if($num == 1){
      echo  "<script>alert('Email already exists. Please try again.');
      window.location.href = 'registration.php';
  </script>";
    exit();
    }

    $sql="INSERT INTO `customer` (`Name`, `Gender`, `Phone Number`, `Email`, `Username`, `Password`, `Dt`) 
    VALUES ('$name', '$gender', '$phone', '$email',  '$uname', '$pass', current_timestamp());";

    if($conn->query($sql) == TRUE){
      // Redirect to login page
      header("Location: login.php");
    exit();
    }
    else{
      echo"ERROR: $sql <br> $conn->error";
    }
  // $conn->close();  
  }
?>
