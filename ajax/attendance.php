<?php 

$q = mysqli_query($connect , "SELECT * FROM student WHERE username='$student'");

$rows = mysqli_fetch_array($q);
$fname= $rows['firstname'];
$class =$rows['class'];
$lname = $rows['lastname'];
$stid = $rows['st_id']


$x = mysqli_query($connect, "INSERT INTO attendance(st_id,today,firstname,lastname,class,intime) 
	VALUES('$stid',curdate(),'$fname','lname',Now())");

if ($x) {
	// code...
}




?>