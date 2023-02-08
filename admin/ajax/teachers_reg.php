<?php 
include("../includes/connection.php");

$username = $_POST['username'];
$password = $_POST['password'];
$c_password = $_POST['confirm_password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$town = $_POST['living_city'];
$email = $_POST['email'];
$phone = $_POST['mobile_number'];
$gender = $_POST['gender'];
$subject = $_POST['subject'];

$error = array();

$output = "";

$hash_p = password_hash($password, PASSWORD_DEFAULT);

$checkuser = mysqli_query($connect, "SELECT username FROM teachers WHERE username ='$username'");

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
}else if (empty($town)) {
	$error['e'] = "Enter Living City/Town";
}else if (empty($email)) {
	$error['e'] = "Enter E-mail";
}else if (empty($phone)) {
	$error['e'] = "Enter Mobile Number";
}else if (empty($gender)) {
	$error['e'] = "Select Gender";
}else if (empty($subject)) {
	$error['e'] = "Select Subject to Teach";
}else if (!password_verify($c_password, $hash_p)) {
	$error['e'] = "Passwords doesn't match";
}else if (mysqli_num_rows($checkuser) > 0) {
	$error['e'] = "Username Already exist";
}

 if (isset($error['e'])) {
  	$output .= "<p class = 'text-center alert alert-danger'>".$error['e']."</p>";
  }

if (count($error) < 1) {
	$query = "INSERT INTO teachers(username,password,firstname,lastname,town,email,phone,gender,subject,regdate) VALUES('$username','$hash_p','$firstname','$lastname','$town','$email','$phone','$gender','$subject',NOW())";
	$res = mysqli_query($connect,$query);


	if ($res) {
		$output .= "<p class='text-center alert alert-success'>Registered succesfully</p>";
	}else{
		$output .= "<p class='text-center alert alert-danger'>Failed to Register</p>";
	}
}

echo "$output";

?>