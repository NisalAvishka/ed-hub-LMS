<?php 
session_start();
include("../includes/connection.php");

$username = $_SESSION['student'];

if (isset($_POST['action'])) {
	if ($_POST['action'] == "show") {
		
$query = "SELECT * FROM student WHERE username = '$username'";

$res = mysqli_query($connect,$query);

$row = mysqli_fetch_array($res);

$output = "
<div class='row d-flex justify-content-center my-5'>

<table class='table col-md-12'>
<tr>
  <td class='text-center'>Student ID</td>
  <td>".$row['st_id']."</td>
 </tr>

<tr>
  <td class='text-center'>First Name</td>
  <td>".$row['firstname']."</td>
 </tr>

 <tr>
  <td class='text-center'>Last Name</td>
  <td>".$row['lastname']."</td>
 </tr>

 <tr>
  <td class='text-center'>E-mail</td>
  <td>".$row['email']."</td>
 </tr>

 <tr>
  <td class='text-center'>Mobile Number</td>
  <td>".$row['phone']."</td>
 </tr>

 <tr>
  <td class='text-center'>Address</td>
  <td>".$row['address']."</td>
 </tr>

 <tr>
  <td class='text-center'>Gender</td>
  <td>".$row['gender']."</td>
 </tr>

 <tr>
  <td class='text-center'>Class</td>
  <td>".$row['class']."</td>
 </tr>

 </table>
</div>


";

echo $output;
}
}









?>