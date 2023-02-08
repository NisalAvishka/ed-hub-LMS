<?php 

include("../includes/connection.php") ;

$all_admin = mysqli_query($connect, "SELECT * FROM admin");
$total_admin = mysqli_num_rows($all_admin);

$all_teachers = mysqli_query($connect, "SELECT * FROM teachers");
$total_teachers = mysqli_num_rows($all_teachers);

$all_students = mysqli_query($connect, "SELECT * FROM student");
$total_students = mysqli_num_rows($all_students);

$all_parents = mysqli_query($connect, "SELECT * FROM parent");
$total_parents = mysqli_num_rows($all_parents);



$data = array(
'total_admin' => $total_admin,
'total_teachers'=> $total_teachers,
'total_students'=> $total_students,
'total_parents'=> $total_parents


);

echo json_encode($data);



?>