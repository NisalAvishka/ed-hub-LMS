<?php 
include("../includes/connection.php");
session_start();

$teacher = $_SESSION['teacher'];


$value = $_POST['value'];



$query = "SELECT * FROM schedule WHERE class='$value' ORDER BY timeslot ASC";


$res = mysqli_query($connect, $query);

$output = "";

$output .="
  <table class= 'table table-bordered'>
    <tr>
      <th>Time-slot</th>
      <th>Title</th>
      <th>Subject</th>
      <th>Teacher</th>
    </tr>
    ";

if (mysqli_num_rows($res) < 1) {
	$output .= "
		<tr>
		   <td colspan='4'>No Classes Scheduled Yet</td>
	    </tr>
	";
}

while ($row = mysqli_fetch_array($res)) {
	

	$output .="
	    <tr>
	      <td>".$row['timeslot']."</td>
	      <td>".$row['title']."</td>
	      <td>".$row['subject']."</td>
	      <td>Mr/Ms ".$row['firstname']."</td>
	     

	";

}

echo $output;




?>