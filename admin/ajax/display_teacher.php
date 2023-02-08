<?php 
include("../includes/connection.php");

if (isset($_POST['action'])) {

	if ($_POST['action'] == "display") {
		
		$query = "SELECT * FROM teachers ORDER BY th_id ASC";
		$res = mysqli_query($connect, $query);
		$output = "";
		$output .="
          <table class= 'table'>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>E-mail</th>
              <th>Mobile Number</th>
              <th>Gender</th>
              <th>Subject</th>
              <th>Action</th>
            </tr>
		";
		while ($row = mysqli_fetch_array($res)) {
			$output .="
               <tr>
                 <td>".$row['th_id']."</td>
                 <td>".$row['username']."</td>
                 <td>".$row['firstname']."</td>
                 <td>".$row['lastname']."</td>
                 <td>".$row['email']."</td>
                 <td>".$row['phone']."</td>
                 <td>".$row['gender']."</td>
                 <td>".$row['subject']."</td>
                 <td>
                    <button id='".$row['th_id']."' class='btn btn-danger remove'>Remove</button>
                 </td>
               </tr>           
			";

		}
		$output .="
        
         </table> 
       
		";

		echo $output;
	}
		if ($_POST['action'] == "remove") {
		$id = $_POST['id'];

		$query = mysqli_query($connect, "DELETE FROM teachers WHERE th_id ='$id'");

		if ($query) {
			//code ..
		}
	}
}









?>