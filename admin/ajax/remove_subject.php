<?php 

include("../includes/connection.php");


$id = $_POST['id'];

$query = mysqli_query($connect, "DELETE FROM my_subject WHERE mys_id = '$id'");


if ($query) {
	// code...
}






?>