<?php 
session_start();
include("../includes/connection.php");

error_reporting(0);

$username = $_POST['username'];
$password = $_POST['password'];

$error = array();

 $check_pass = mysqli_query($connect, "SELECT password FROM admin WHERE username='$username'");

 $row = mysqli_fetch_array($check_pass);

 $pass_h = $row["password"];
  


 if(empty($username)){
    $error['e'] = "Enter username";
 }else if(empty($password)){
    $error['e'] = "Enter password";
 }else if(!password_verify($password, $pass_h)){
   $error['e'] = "Incorreect username or password";
}

$output = "";
if (isset($error['e'])){
    $output .= "<p class='alert alert-danger text-center'>".($error['e'])."</p>";
}else{
    $output = "";
}


if (count($error) < 1) {
   $_SESSION['admin'] = $username;
   echo "<script>window.location.href='admin/'</script>";
   $output .= "<p class='alert alert-success text-center'>You have successfully login</p>"; 
}

echo $output;



?>