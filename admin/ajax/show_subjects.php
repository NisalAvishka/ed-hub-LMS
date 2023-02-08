<?php 

include("../includes/connection.php");


if(isset($_POST['action'])){

	if ($_POST['action'] == "display") {
		$current = $_POST['current_class'];

		$query = "SELECT * FROM my_subject WHERE class_name = '$current'";

		$res = mysqli_query($connect, $query);
		$output = "";


		if (mysqli_num_rows($res) < 1) {
			$output .="

			<h2 class='text-center'>No Subject Added yet </h2>

			";
		}else{

			$output .="

			<table class='table table-bordered'>
			  <tr>
			     <th>Subject Name</th>
			     <th>Date Added </th>
			     <th>Action</th>
			  </tr>
			";


			while ($row = mysqli_fetch_array($res)) {
				$output .="


				<tr>
				  <td>".$row['subject_name']."</td>
				  <td>".$row['date_added']."</td>
				  <td>
				    <button class='btn btn-danger col-md-12 remove' id='".$row['mys_id']."'>Remove</button>
				  </td>
				</tr>
				";
			}


		}

		echo $output;
	}

}
















?>