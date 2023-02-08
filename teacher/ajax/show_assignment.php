<?php 
session_start();


include("../includes/connection.php");

error_reporting(0);

$teacher = $_SESSION['teacher'];

$q = mysqli_query($connect, "SELECT * FROM teachers WHERE username='$teacher'");

$rowx = mysqli_fetch_array($q);

$subject = $rowx['subject'];

$type = $_POST['type'];


$query = mysqli_query($connect, "SELECT * FROM post_assignment WHERE type='$type' AND subject='$subject'");

$output = "";

if (mysqli_num_rows($query) < 1) {
	$output .= "No posts yet";
}else{
	while ($row = mysqli_fetch_array($query)) {
		$output .="
		  <div class='col-md-12 shadow-sm'>
		     <a href='post/".$row['file']."' download='".$row['file']."'><p class='my-2'><i class='fa fa-file-pdf mx-2'></i> ".$row['file']."</p></a>
		     <a href = 'submission.php?id=".$row['asign_id']."'><button class='btn btn-info my-5'>View Submissions</button></a>
		  </div>

		";
	}
}

echo $output;






?>