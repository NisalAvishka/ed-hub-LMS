<?php 

include("../includes/connection.php");

session_start();

$teacher = $_SESSION['teacher'];

$q = mysqli_query($connect, "SELECT * FROM teachers WHERE username='$teacher'");
$row = mysqli_fetch_array($q);
$subject = $row['subject'];


$query = mysqli_query($connect, "SELECT * FROM chat WHERE subject='$subject'");


$output = "";

if (mysqli_num_rows($query) < 1) {
	$output .="

	<div class='my-5'>

	<h5 class='text-center'>No Messages yet</h5>

	</div>



	";
}else{
	while ($rows = mysqli_fetch_array($query)) {

		if ($rows['file']!="") {
			$file = "
			<div class='row d-flex justify-content-center'>
			  <div class='col-md-6'>
			    <img src='Chat/".$rows['file']."' class='col-md-12' style='height:200px;'>
			  </div>
			</div>

			";
		}else{
			$file = "";

		}
		
		$output .="
		   <div class='my-2 shadow-sm' style='border:2px solid gray'>
		     <h5> <i class='fa-solid fa-comments'></i> From- ".$rows['firstname']." ".$rows['lastname']."</h5>
		      <p><i class='fa-solid fa-calendar'></i>".$rows['date_posted']."</p>
		     <h4 class='text-center'>".$rows['title']."</h4>
		     $file
		     <p class='text-center'>".$rows['description']."</p>
		     <button class='btn btn-danger delete' id='".$rows['ch_id']."'>Delete Message</button>

		   </div>
		";
	}
}


echo $output;



?>