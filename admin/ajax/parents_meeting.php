<?php 
session_start();


include("../includes/connection.php");

$admin = $_SESSION['admin'];


$title = $_POST['title'];
$class = $_POST['class'];
$time = $_POST['time'];
$link = $_POST['link'];
$date = $_POST['date'];



$error = array();

if (empty($title)) {
	$error['1'] = "Enter the title";
}else if (empty($class)) {
	$error['1'] = "Select Class";
}else if (empty($time)) {
	$error['1'] = "Enter Time-slot";
}else if (empty($link)) {
	$error['1'] = "Enter the Joining Link";
}
$output = "";

if (count($error) < 1) {
	$query = mysqli_query($connect, "INSERT INTO prtmeeting(title,class,mdate,mtime,link)
		VALUES('$title','$class','$date','$time','$link')");

	if ($query) {
		$output .= "<p class= 'alert alert-success'>You have scheduled the meeting successfully</p>";
	}else{
		$output .= "<p class= 'alert alert-danger'>Failed to schedule the meeting</p>";
	}
}

echo $output;


?>