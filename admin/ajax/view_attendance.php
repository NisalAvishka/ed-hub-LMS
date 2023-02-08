<?php 


include("../includes/connection.php");



$date = $_POST['date'];
$class = $_POST['class'];


$query = mysqli_query($connect, "SELECT * FROM attendance WHERE today='$date' and class='$class'");

$output = "";

$output .= "
     <h3 class='text-center my-3'>Attended Students</h3>
     <table class='table table-bordered'>
          <tr>
            <th>Date</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Login time</th>
          </tr>
";

if (mysqli_num_rows($query) < 1) {
  $output .="

  <tr>
    <td colspan='4'>No Students have attended yet</td>
  </tr>



  ";
}else{
  while ($rows = mysqli_fetch_array($query)) {
    $output .="
     <tr>
       <td>".$rows['today']."</td>
       <td>".$rows['firstname']."</td>
       <td>".$rows['lastname']."</td>
       <td>".$rows['intime']."</td>
     </tr>
    ";
  }

}



echo $output;

?>