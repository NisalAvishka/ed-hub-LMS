<?php 
include("../includes/connection.php");

$username = $_POST['username'];
$password = $_POST['password'];
$c_password = $_POST['confirm_password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['mobile_number'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$class = $_POST['class'];

$error = array();

$output = "";

$hash_p = password_hash($password, PASSWORD_DEFAULT);

$checkuser = mysqli_query($connect, "SELECT username FROM student WHERE username ='$username'");

if (empty($username)) {
	$error['e'] = "Enter Username";
}else if (empty($password)) {
	$error['e'] = "Enter Password";
}else if (empty($c_password)) {
	$error['e'] = "Enter confirm password";
}else if (empty($firstname)) {
	$error['e'] = "Enter First Name";
}else if (empty($lastname)) {
	$error['e'] = "Enter Last Name";
}else if (empty($address)) {
	$error['e'] = "Enter Address";
}else if (empty($email)) {
	$error['e'] = "Enter E-mail";
}else if (empty($phone)) {
	$error['e'] = "Enter Mobile Number";
}else if (empty($gender)) {
	$error['e'] = "Select Gender";
}else if (empty($dob)) {
	$error['e'] = "Enter Date of Birth";
}else if (empty($class)) {
	$error['e'] = "Enter Class Name";
}else if (!password_verify($c_password, $hash_p)) {
	$error['e'] = "Passwords doesn't match";
}else if (mysqli_num_rows($checkuser) > 0) {
	$error['e'] = "Username Already exist";
}

 if (isset($error['e'])) {
  	$output .= "<p class = 'text-center alert alert-danger'>".$error['e']."</p>";
  }

if (count($error) < 1) {
	$query = "INSERT INTO student(username,password,firstname,lastname,address,email,phone,gender,date_birth,class) VALUES('$username','$hash_p','$firstname','$lastname','$address','$email','$phone','$gender','$dob','$class')";
	$res = mysqli_query($connect,$query);


	if ($res) {
		$output .= "<p class='text-center alert alert-success'>Registered succesfully</p>";
	}else{
		$output .= "<p class='text-center alert alert-danger'>Failed to Register</p>";
	}
}

echo "$output";

?>