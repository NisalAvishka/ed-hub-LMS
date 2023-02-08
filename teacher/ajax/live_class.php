<?php 
session_start();


include("../includes/connection.php");


$title = $_POST['title'];
$class = $_POST['class'];
$time = $_POST['time'];
$link = $_POST['link'];


$teacher = $_SESSION['teacher'];

$q = mysqli_query($connect, "SELECT * FROM teachers WHERE username='$teacher'");

$rows = mysqli_fetch_array($q);

$subject = $rows['subject'];
$firstname = $rows['firstname'];

$checktime = mysqli_query($connect, "SELECT sch_id FROM schedule WHERE class ='$class' AND timeslot ='$time' ");

$error = array();

if (empty($title)) {
	$error['1'] = "Enter the title";
}else if (empty($class)) {
	$error['1'] = "Select Class";
}else if (empty($time)) {
	$error['1'] = "Select Time-slot";
}else if (empty($link)) {
	$error['1'] = "Enter the Joining Link";
}else if (mysqli_num_rows($checktime) > 0) {
	$error['e'] = "A class is already scheduled at this time";
}

$output = "";

if (count($error) < 1) {
	$query = mysqli_query($connect, "INSERT INTO schedule(timeslot,title,class,subject,firstname,link)
		VALUES('$time','$title','$class','$subject','$firstname','$link')");

	if ($query) {
		$output .= "<p class= 'alert alert-success'>You have scheduled the class successfully</p>";
	}else{
		$output .= "<p class= 'alert alert-danger'>Failed to schedule the class</p>";
	}
}

echo $output;


?>