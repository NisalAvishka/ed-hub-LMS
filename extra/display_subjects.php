<?php 

include("../includes/connection.php");

if (isset($_POST['action'])) {

	if ($_POST['action'] == "display") {
		
		$query = "SELECT * FROM subject ORDER BY sb_id ASC";
		$res = mysqli_query($connect, $query);
		$output = "";
		$output .="
          <table class= 'table table-bordered border-dark w-55'>
            <tr>
              <th>ID</th>
              <th>Subject</th>
            </tr>
		";
		while ($row = mysqli_fetch_array($res)) {
			$output .="
               <tr>
                 <td>".$row['sb_id']."</td>
                 <td>".$row['name']."</td>
               </tr>    



              
			";
		}
		$output .="
        
         </table>  
		";

		echo $output;

    }

    if ($_POST['action'] == "input") {
		$name = $_POST['subject'];

		$query = mysqli_query($connect, "INSERT INTO subject(sb_id,name) VALUES('',$name')");

		if ($query) {
			// code...
		}
	}
}




?>