<?php 
session_start();
include("../includes/connection.php");

$username = $_SESSION['teacher'];

if (isset($_POST['action'])) {
	if ($_POST['action'] == "show") {
		
$query = "SELECT * FROM teachers WHERE username = '$username'";

$res = mysqli_query($connect,$query);

$row = mysqli_fetch_array($res);

$output = "
<div class='row d-flex justify-content-center my-5'>

<table class='table col-md-12'>
<tr>
  <td class='text-center'>Teacher ID</td>
  <td>".$row['th_id']."</td>
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
  <td class='text-center'>Living City</td>
  <td>".$row['town']."</td>
 </tr>

 <tr>
  <td class='text-center'>Gender</td>
  <td>".$row['gender']."</td>
 </tr>

  <tr>
  <td class='text-center'>Teaching Subject</td>
  <td>".$row['subject']."</td>
 </tr>

 </table>
</div>


";

echo $output;
}
}









?>