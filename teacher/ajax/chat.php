<?php 
session_start();
include("../includes/connection.php");

$title = $_POST['title'];
$des = $_POST['description'];
$file = $_FILES['file']['name'];
$class = $_POST['class'];


$teacher = $_SESSION['teacher'];

$query = mysqli_query($connect, "SELECT * FROM teachers WHERE username='$teacher'");

$row = mysqli_fetch_array($query);

$subject = $row['subject'];
$fname= $row['firstname'];
$lname = $row['lastname'];


if (empty($title)) {
	echo "<p class='alert alert-danger text-center'>Add Title</p>";
}else if (empty($des)) {
	echo "<p class='alert alert-danger text-center'>Add Description</p>";
}else if (empty($class)) {
	echo "<p class='alert alert-danger text-center'>Select Class</p>";
}else{                                                                                                                                               
	$q = mysqli_query($connect, "INSERT INTO chat(firstname,lastname,title,description,file,subject,class,date_posted)
		VALUES('$fname','$lname','$title','$des','$file','$subject','$class',NOW())");

	if($q){
		move_uploaded_file($_FILES['file']['tmp_name'], "../Chat/$file");

		echo "<p class='alert alert-success text-center'>You have sent the message successfully</p>";
	}
}



?>