<?php 

include("../includes/connection.php");

session_start();

$student = $_SESSION['student'];


$query = mysqli_query($connect, "SELECT * FROM image_gallery ORDER BY img_id");


$output = "";

if (mysqli_num_rows($query) < 1) {
	$output .="

	<div class='my-5'>

	<h5 class='text-center'>No Images yet</h5>

	</div>



	";
}else{
	while ($rows = mysqli_fetch_array($query)) {

		if ($rows['image']!="") {
			$file = "
			<div class='row d-flex justify-content-center'>
			  <div class='col-md-12'>
			    <img src='imgs/".$rows['image']."' class='col-md-12'>
			  </div>
			</div>

			";
		}else{
			$file = "";

		}
		
		$output .="
		   <div class='my-5 shadow-sm py-3' style='border:1px solid gray'>
		     <h5> <i class='fa-regular fa-user mx-2 '></i> ".$rows['firstname']." ".$rows['lastname']."</h5>
		     <p class='mx-2'>Grade ".$rows['class']."</P>
		     <p><i class='fa-solid fa-earth-americas mx-2'></i>".$rows['date_posted']."</p>
		     <h4 class='text-center'>".$rows['title']."</h4>
		     <p class='text-center'>".$rows['description']."</p>
		     $file
		     

		   </div>
		";
	}
}


echo $output;



?>