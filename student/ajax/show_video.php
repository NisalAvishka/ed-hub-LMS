<?php 

include("../includes/connection.php");

session_start();

$student = $_SESSION['student'];


$query = mysqli_query($connect, "SELECT * FROM video_gallery ORDER BY vid_id DESC");


$output = "";

if (mysqli_num_rows($query) < 1) {
	$output .="

	<div class='my-5'>

	<h5 class='text-center'>No Videos yet</h5>

	</div>



	";
}else{
	while ($rows = mysqli_fetch_array($query)) {
		
		$output .="
		   <div class='my-5 shadow-sm py-3 col-md-12' style='border:1px solid gray'>
		     <h5> <i class='fa-regular fa-user mx-2 '></i> ".$rows['firstname']." ".$rows['lastname']."</h5>
		     <p class='mx-2'>Grade ".$rows['class']."</P>
		     <p><i class='fa-solid fa-earth-americas mx-2'></i>".$rows['date_posted']."</p>
		     <h4 class='text-center'>".$rows['title']."</h4>
		     <p class='text-center'>".$rows['description']."</p>
		    <iframe width='560' height='315'class='col-md-12' src='".$rows['link']."' title='YouTube video player' frameborder='0 allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>
		      
		     
		     

		   </div>
		";
	}
}


echo $output;



?>