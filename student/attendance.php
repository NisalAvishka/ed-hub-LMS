<?php 
session_start();

include("../includes/connection.php");

$student = $_SESSION['student'];

$q = mysqli_query($connect , "SELECT * FROM student WHERE username='$student'");

$rows = mysqli_fetch_array($q);
$fname= $rows['firstname'];
$class =$rows['class'];
$lname = $rows['lastname'];
$stid = $rows['st_id'];

$myDate = date('d/m/Y');


$query = mysqli_query($connect, "INSERT INTO attendance(today,stid,firstname,lastname,class,intime) VALUES('$myDate','$stid','$fname','$lname','$class',NOW())");



if ($query) {
	header('Location: ../student/index.php');
}else{
	echo $myDate;
}




?>