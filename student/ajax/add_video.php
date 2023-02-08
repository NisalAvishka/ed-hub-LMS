<?php 
session_start();
include("../includes/connection.php");

error_reporting(0);

$title = $_POST['title'];
$des = $_POST['description'];
$link = $_POST['link'];



$student = $_SESSION['student'];

$q = mysqli_query($connect, "SELECT * FROM student WHERE username='$student'");

$rows = mysqli_fetch_array($q);
$fname= $rows['firstname'];
$lname = $rows['lastname'];
$class =$rows['class'];



$error = array();
if (empty($title)) {
	$error['1'] = "Enter Title";
}else if (empty($link)) {
	$error['1'] = "Enter link for the video";
}


$output = "";
if (isset($error['1'])) {
	$output = "<p class='alert alert-danger text-center'>".$error['1']."</p>";
}else{
	$output = "";
}


if (count($error) < 1) {
	$query = mysqli_query($connect, "INSERT INTO video_gallery(firstname,lastname,class,title,link,description,date_posted) 
		VALUES('$fname','$lname','$class','$title','$link','$des',NOW())");

	if ($query) {
		$output = "<p class='alert alert-success text-center'>You have uploaded the Video succesfully</p>";
	}else{
		$output = "<p class='alert alert-danger text-center my-2'>Failed to upload</p>";
	}
}

echo $output;

?>
