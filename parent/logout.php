<?php

session_start();

if (isset($_SESSION['parent'])) {
 	unset($_SESSION['parent']);


 	header("Location: ../parentlogin.php");
 } 




?>