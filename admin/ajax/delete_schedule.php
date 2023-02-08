 <?php 
session_start();
include("../includes/connection.php");

$admin = $_SESSION['admin'];

   

$query = mysqli_query($connect, "DELETE FROM schedule");

        if ($query) {
            header('Location: ../schedule.php');
        }else{
            echo "Query declined";
        }
    

?>