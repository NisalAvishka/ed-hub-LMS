<?php 
include("../includes/connection.php");

if (isset($_POST['action'])) {
	if ($_POST['action'] == "delete_message") {
		$id = $_POST['id'];

		$query = mysqli_query($connect, "DELETE FROM chat WHERE ch_id='$id'");

		if ($query) {
			// code...
		}
	}
}












?>