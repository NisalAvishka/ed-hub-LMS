<?php 
include("../includes/connection.php");
session_start();

error_reporting(0);

$student = $_SESSION['student'];

$q = mysqli_query($connect, "SELECT * FROM student WHERE username='$student'");

$row = mysqli_fetch_array($q);

$fname = $row['firstname'];
$lname = $row['lastname'];
$class = $row['class'];


$id = $_POST['id'];
$file = $_FILES['file']['name'];


$file_ex = strtolower(end(explode(".", $_FILES['file']['name'])));

$extension = array("pdf");


$error = array();
if (empty($file)) {
	$error['1'] = "Select file to upload";
}else if (!in_array($file_ex, $extension)) {
	$error['1'] = "We only accept pdf file";
}


$output = "";
if (isset($error['1'])) {
	$output = "<p class='alert alert-danger text-center'>".$error['1']."</p>";
}else{
	$output = "";
}


if (count($error) < 1) {
	$query = mysqli_query($connect, "INSERT INTO submission(post_id,firstname,lastname,class,file,date_submitted) VALUES('$id','$fname',
		'$lname','$class','$file',NOW())");

	if ($query) {
		move_uploaded_file($_FILES['file']['tmp_name'], "../submit/".$file."");
		$output = "<p class='alert alert-success text-center'>You have uploaded assignment/homework succesfully</p>";
	}else{
		$output = "<p class='alert alert-danger text-center my-2'>Failed to upload</p>";
	}
}

echo $output;

?>