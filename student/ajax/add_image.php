<?php 
session_start();
include("../includes/connection.php");

error_reporting(0);

$title = $_POST['title'];
$des = $_POST['description'];
$file = $_FILES['file']['name'];



$student = $_SESSION['student'];

$q = mysqli_query($connect, "SELECT * FROM student WHERE username='$student'");

$rows = mysqli_fetch_array($q);
$fname= $rows['firstname'];
$lname = $rows['lastname'];
$class =$rows['class'];


$file_ex = strtolower(end(explode(".", $_FILES['file']['name'])));

$extension = array("png");


$error = array();
if (empty($title)) {
	$error['1'] = "Enter Title";
}else if (empty($file)) {
	$error['1'] = "Select Image to upload";
}else if (!in_array($file_ex, $extension)) {
	$error['1'] = "We only accept png files";
}


$output = "";
if (isset($error['1'])) {
	$output = "<p class='alert alert-danger text-center'>".$error['1']."</p>";
}else{
	$output = "";
}


if (count($error) < 1) {
	$query = mysqli_query($connect, "INSERT INTO image_gallery(firstname,lastname,class,title,description,image,date_posted) 
		VALUES('$fname','$lname','$class','$title','$des','$file',NOW())");

	if ($query) {
		move_uploaded_file($_FILES['file']['tmp_name'], "../imgs/".$file."");
		$output = "<p class='alert alert-success text-center'>You have uploaded the Image succesfully</p>";
	}else{
		$output = "<p class='alert alert-danger text-center my-2'>Failed to upload</p>";
	}
}

echo $output;

?>
