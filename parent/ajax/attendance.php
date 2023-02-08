<?php 

include("../includes/connection.php");

session_start();

$parent = $_SESSION['parent'];

$q = "SELECT * FROM parent WHERE username='$parent'";


$rs = mysqli_query($connect, $q);

$rows = mysqli_fetch_array($rs);

$fname = $rows['chfname'];
$lname = $rows['chlname'];

$query = mysqli_query($connect, "SELECT * FROM attendance WHERE firstname='$fname' AND lastname='$lname'");

$output = "";

$output .="
  <table class= 'table table-bordered'>
    <tr>
      <th>Date</th>
      <th>Student_ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Class</th>
      <th>Joined Time</th>
    </tr>
    ";

if (mysqli_num_rows($query) < 1) {
	$output .= "
		<tr>
		   <td colspan='6'>Student doesn't join yet</td>
	    </tr>
	";
}

while ($row = mysqli_fetch_array($query)) {
	

	$output .="
	    <tr>
	      <td>".$row['today']."</td>
	      <td>".$row['stid']."</td>
	      <td>".$row['firstname']."</td>
	      <td>".$row['lastname']."</td>
	      <td>Grade ".$row['class']."</td>
	      <td>".$row['intime']."</td>
	     

	";

}

echo $output;






?>