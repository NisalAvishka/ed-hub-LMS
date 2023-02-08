<?php 
session_start();
include("../includes/connection.php");

$old = $_POST['old'];
$new = $_POST['new'];
$confirm = $_POST['confirm'];

$username = $_SESSION['teacher'];

$get_user = mysqli_query($connect, "SELECT * FROM teachers WHERE username ='$username'");

$row = mysqli_fetch_array($get_user);

$old_pass_hash = $row['password'];

$new_pass_hash = password_hash($new, PASSWORD_DEFAULT);

$error = array();

if (empty($old)) {
	$error['e'] = "Enter Old Password";
}else if (empty($new)) {
	$error['e'] = "Enter New Password";
}else if (empty($confirm)) {
	$error['e'] = "Confirm the Password";
}else if (!password_verify($confirm, $new_pass_hash)) {
	$error['e'] = "Both new and confirm passwords do not match";
}

$output = "";
if (isset($error['e'])) {
	$output .= "<p class= 'text-center alert alert-danger'>".$error['e']."</P>";
}else{
	$output .="";
}

if(count($error) < 1){
	$query = "UPDATE teachers SET password='$new_pass_hash' WHERE username = '$username'";
	$res = mysqli_query($connect, $query);

	if ($res) {
		$output .= "<p class= 'text-center alert alert-success'>You have successfully change your password</P>";
	}else{
		$output .= "<p class= 'text-center alert alert-danger'>Failed to change password</P>";
	}
}

echo $output;






?>