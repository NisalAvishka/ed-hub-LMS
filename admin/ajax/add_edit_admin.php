<?php
include("../includes/connection.php");

$username = $_POST['username'];
$password = $_POST['password'];
$c_password = $_POST['confirm_password'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$output = "";

$error = array();

$hash_p = password_hash($password, PASSWORD_DEFAULT);

$checkuser = mysqli_query($connect, "SELECT username FROM admin WHERE username ='$username'");

if (empty($username)) {
	$error['e'] = "Enter Admin Username";
}else if (empty($password)) {
	$error['e'] = "Enter Password";
}else if (empty($c_password)) {
	$error['e'] = "Enter confirm password";
}else if (empty($fname)) {
	$error['e'] = "Enter First Name";
}else if (empty($lname)) {
	$error['e'] = "Enter Last Name";
}else if (empty($email)) {
	$error['e'] = "Enter E-mail";
}else if (empty($phone)) {
	$error['e'] = "Enter Mobile Number";
}else if (!password_verify($c_password, $hash_p)) {
	$error['e'] = "Passwords doesn't match";
}else if (mysqli_num_rows($checkuser) > 0) {
	$error['e'] = "Username Already exist";
}

  if (isset($error['e'])) {
  	$output .= "<p class = 'text-center alert alert-danger'>".$error['e']."</p>";
  }



if (count($error) < 1) {
	$query = "INSERT INTO admin(username,password,firstname,lastname,email,phone) VALUES('$username','$hash_p','$fname','$lname','$email','$phone')";
	$res = mysqli_query($connect,$query);


	if ($res) {
		$output .= "<p class='text-center alert alert-success'>Admin added</p>";
	}else{
		$output .= "<p class='text-center alert alert-danger'>Failed to add admin</p>";
	}
}

echo "$output";

?>