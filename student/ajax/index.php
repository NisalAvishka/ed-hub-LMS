<?php 
include("../includes/connection.php");

session_start();

$student = $_SESSION['student'];

$query = mysqli_query($connect, "SELECT * FROM student WHERE username ='$student'");
$row = mysqli_fetch_array($query);
$class = $row['class'];

$get_subject = mysqli_query($connect, "SELECT * FROM my_subject WHERE class_name = '$class'");
$total_subject = mysqli_num_rows($get_subject);

















$array = array(
	'total_subject' => $total_subject
	


);

echo json_encode($array);











?>