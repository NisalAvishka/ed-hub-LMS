<?php 

include("../includes/connection.php");

if (isset($_POST['action'])) {
	
	if ($_POST['action'] == "add") {
		
		$name = $_POST['name'];

		$query = "INSERT INTO class(name,date_added) VALUES ('$name',NOW())";
		$res = mysqli_query($connect,$query);

		if ($res) {
			// code...
		}

	}else if($_POST['action'] == "show"){

		$query = "SELECT * FROM class";

		$res = mysqli_query($connect,$query);

		$output = "";
		$output .= "
		    <table class='table table-bordered'>
		      <tr>
		         <th>Class ID</th>
		         <th>Class Name</th>
		         <th>Action</th>
		      </tr>
		";
		if (mysqli_num_rows($res) < 1) {
			$output .="
                <tr>
                   <td class='text-center' colspan='3'>No Course<td>
                </tr>
			";
		}

		while ($row = mysqli_fetch_array($res)) {
			$output .="

			<tr>

			   <td>".$row['cl_id']."</td>
			   <td>Grade ".$row['name']."</td>
			   <td>
			      <button class='btn btn-danger remove' id='".$row['cl_id']."'>Remove</button>
			   </td>
			</tr>
			";
		}

		echo $output;
	}else if ($_POST['action'] == "remove") {

		$id = $_POST['id'];

		$query = mysqli_query($connect, "DELETE FROM class WHERE cl_id ='$id'");

		if ($query) {
			// code...
		}
	}
}












?>