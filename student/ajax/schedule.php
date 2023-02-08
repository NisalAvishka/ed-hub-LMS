<?php 

include("../includes/connection.php");

session_start();

$student = $_SESSION['student'];

$q = mysqli_query($connect, "SELECT * FROM student WHERE username='$student'");
$rowsx = mysqli_fetch_array($q);
$class = $rowsx['class'];

$query = "SELECT * FROM schedule WHERE class='$class' ORDER BY timeslot ASC";


$res = mysqli_query($connect, $query);

$output = "";

$output .="
  <table class= 'table table-bordered'>
    <tr>
      <th>Time-slot</th>
      <th>Title</th>
      <th>Subject</th>
      <th>Teacher</th>
      <th>Joining Link</th>
    </tr>
    ";

if (mysqli_num_rows($res) < 1) {
	$output .= "
		<tr>
		   <td colspan='5'>No Classes Scheduled Yet</td>
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
	      <td><a class='btn btn-info my-2' href='".$row['link']."' target='_blank'>Join to Class</a></td>
	     

	";

}

echo $output;






?>
