<?php 
session_start();
if (isset($_SESSION['student'])) {
	unset($_SESSION['student']);


	header("Location: ../studentlogin.php");
}





?>