<?php 
include("../includes/connection.php");
session_start();

$student = $_SESSION['student'];
$q = "SELECT * FROM student WHERE username='$student'";
$pel = mysqli_query($connect, $q);
$rowsx  = mysqli_fetch_array($pel);
$class = $rowsx['class'];


$value = $_POST['value'];
$query = "";

if ($value == "all") {
	$query = "SELECT * FROM chat WHERE class='$class' ORDER BY ch_id DESC";
}else{
	$query = "SELECT * FROM chat WHERE subject='$value' AND class = '$class' ORDER BY ch_id DESC";
}
$res = mysqli_query($connect, $query);

$output = "";

if (mysqli_num_rows($res) < 1) {
	$output .= "<h3 class='text-center my-5'>No Messages Yet </h3>";
}

while ($row = mysqli_fetch_array($res)) {
	$file = "";

	if ($row['file'] == "") {
		$file = "";
	}else{
		$file = "
		<img src='../teacher/Chat/".$row['file']."' class='col-md-12'>

		";
	}

	$output .="

	   <div class='my-2 shadow-sm' style='border:2px solid gray'>
		     <h5> <i class='fa-solid fa-comments'></i> From- ".$row['firstname']." ".$row['lastname']."</h5>
		     <p><i class='fa-solid fa-calendar'></i>".$row['date_posted']."</p>
		     <h4 class='text-center'>".$row['title']."</h4>
		     $file
		     <p class='text-center'>".$row['description']."</p>
		     

		   </div>
	";

}

echo $output;






?>