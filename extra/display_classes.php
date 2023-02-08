<?php 

include("../includes/connection.php");

if (isset($_POST['action'])) {

	if ($_POST['action'] == "display") {
		
		$query = "SELECT * FROM class ORDER BY cl_id ASC";
		$res = mysqli_query($connect, $query);
		$output = "";
		$output .="
          <table class= 'table table-bordered border-dark w-25'>
            <tr>
              <th>ID</th>
              <th>Grade</th>
            </tr>
		";
		while ($row = mysqli_fetch_array($res)) {
			$output .="
               <tr>
                 <td>".$row['cl_id']."</td>
                 <td>".$row['grade']."</td>
               </tr>    



              
			";
		}
		$output .="
        
         </table>  
		";

		echo $output;

    }
}




?>