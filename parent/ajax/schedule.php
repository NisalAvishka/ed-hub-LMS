<?php 

include("../includes/connection.php");

session_start();

$parent = $_SESSION['parent'];

$query = "SELECT * FROM prtmeeting";


$res = mysqli_query($connect, $query);

$output = "";

$output .="
  <table class= 'table table-bordered'>
    <tr>
      <th>Title</th>
      <th>Class</th>
      <th>Date</th>
      <th>Time</th>
      <th>Joining Link</th>
    </tr>
    ";

if (mysqli_num_rows($res) < 1) {
	$output .= "
		<tr>
		   <td colspan='5'>No Meetings Scheduled Yet</td>
	    </tr>
	";
}

while ($row = mysqli_fetch_array($res)) {
	

	$output .="
	    <tr>
	      <td>".$row['title']."</td>
	      <td>Grade ".$row['class']."</td>
	      <td>".$row['mdate']."</td>
	      <td>".$row['mtime']."</td>
	      <td><a href='".$row['link']."'>".$row['link']."</a></td>
	     

	";

}

echo $output;






?>
