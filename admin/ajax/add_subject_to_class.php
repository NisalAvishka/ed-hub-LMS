<?php

include("../includes/connection.php");

if (isset($_POST['action'])) {
 	
 	if ($_POST['action'] == "add") {

 		$class = $_POST['program'];
 		$subject = $_POST['subject'];

 		$query = mysqli_query($connect, "INSERT INTO my_subject(class_name,subject_name,date_added) VALUES('$class', '$subject',NOW()) ");

 		if ($query) {
 			echo "<p class='text-center alert alert-success'>Subject Added</p>";
 		}
 	}
 } 









?>