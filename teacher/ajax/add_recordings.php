<?php 
session_start();


include("../includes/connection.php");
error_reporting(0);



$teacher = $_SESSION['teacher'];

$q = mysqli_query($connect, "SELECT * FROM teachers WHERE username='$teacher'");

$rows = mysqli_fetch_array($q);

$subject = $rows['subject'];

$lecdate = $_POST['lec_date'];
$class = $_POST['class'];
$link = $_POST['link'];
$file = $_FILES['file']['name'];

$error = array();
$file_ex = strtolower(end(explode(".", $_FILES['file']['name'])));

$extensions = array("pdf");


if (empty($lecdate)) {
	$error['1'] = "Select the Date";
}else if (empty($class)) {
	$error['1'] = "Select Class";
}else if (empty($link)) {
	$error['1'] = "Enter Recording link";
}else if (empty($file)) {
	$error['1'] = "Select PDF file";
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
	$query = mysqli_query($connect, "INSERT INTO note(lecdate,class,subject,link,file ) VALUES('$lecdate','$class','$subject','$link','$file')");

	if ($query) {
		$output .= "<p class= 'alert alert-success'>You have posted successfully</p>";
		move_uploaded_file($_FILES['file']['tmp_name'], "../note/".$file."");
	}else{
		$output .= "<p class= 'alert alert-danger'>Failed to post</p>";
	}
}

echo $output;

?>