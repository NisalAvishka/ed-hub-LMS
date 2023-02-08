<?php 
session_start();


include("../includes/connection.php");

error_reporting(0);

$teacher = $_SESSION['teacher'];

$q = mysqli_query($connect, "SELECT * FROM teachers WHERE username='$teacher'");

$row = mysqli_fetch_array($q);

$subject = $row['subject'];

$type = $_POST['type'];
$due_date = $_POST['due_date'];
$class = $_POST['class'];
$pdf_file = $_FILES['file']['name'];

$error = array();
$file_ex = strtolower(end(explode(".", $_FILES['file']['name'])));

$extensions = array("pdf");


if ($type == "") {
	$error['1'] = "Select the type of post";
}else if (empty($due_date)) {
	$error['1'] = "Select Due Date";
}else if (empty($pdf_file)) {
	$error['1'] = "Select PDF File";
}else if (empty($class)) {
	$error['1'] = "Select Class";
}else if (!in_array($file_ex, $extensions)) {
	$error['1'] = "Only PDF file is accepted";
}

$output = "";
if (isset($error['1'])) {
	$output .= "<p class= 'alert alert-danger'>".$error['1']."</p>";
}else{
	$output .= "";
}



if (count($error) < 1) {
	$query = mysqli_query($connect, "INSERT INTO post_assignment(type,due_date,file,subject,class,date_posted) VALUES('$type','$due_date',
		'$pdf_file','$subject','$class',NOW())");

	if ($query) {
		$output .= "<p class= 'alert alert-success'>You have posted ".$type." successfully</p>";
		move_uploaded_file($_FILES['file']['tmp_name'], "../post/".$pdf_file."");
	}else{
		$output .= "<p class= 'alert alert-danger'>Failed to post ".$type."</p>";
	}
}

echo $output;

?>