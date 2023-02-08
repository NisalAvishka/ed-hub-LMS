<?php 

include("../includes/connection.php");

if (isset($_POST['action'])) {
	
	if ($_POST['action'] == "add") {
		
		$name = $_POST['name'];

		$query = "INSERT INTO subject(name,date_added) VALUES ('$name',NOW())";
		$res = mysqli_query($connect,$query);

		if ($res) {
			// code...
		}

	}else if($_POST['action'] == "show"){

		$query = "SELECT * FROM subject";

		$res = mysqli_query($connect,$query);

		$output = "";
		$output .= "
		    <table class='table table-bordered'>
		      <tr>
		         <th>Subject ID</th>
		         <th>Subject Name</th>
		         <th>Action</th>
		      </tr>
		";
		if (mysqli_num_rows($res) < 1) {
			$output .="
                <tr>
                   <td class='text-center' colspan='3'>No Subjects<td>
                </tr>
			";
		}

		while ($row = mysqli_fetch_array($res)) {
			$output .="

			<tr>

			   <td>".$row['sb_id']."</td>
			   <td>".$row['name']."</td>
			   <td>
			      <button class='btn btn-danger s_remove' id='".$row['sb_id']."'>Remove</button>
			   </td>
			</tr>
			";
		}

		echo $output;
	}else if ($_POST['action'] == "remove") {

		$id = $_POST['id'];

		$query = mysqli_query($connect, "DELETE FROM subject WHERE sb_id ='$id'");

		if ($query) {
			// code...
		}
	}
}












?>