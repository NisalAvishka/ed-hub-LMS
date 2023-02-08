<?php include("header.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<?php include("sidenav.php"); ?>	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="col-md-12">
          <h2 class="text-center">View Students</h2>
          <?php

          include("../includes/connection.php");

          $teacher = $_SESSION['teacher'];
          $q = mysqli_query($connect, "SELECT * FROM teachers WHERE username = '$teacher'");
          $r = mysqli_fetch_array($q);

          $subject = $r['subject'];

          //echo $subject;

          $qq = mysqli_query($connect, "SELECT * FROM my_subject WHERE subject_name = '$subject'");

          while($row = mysqli_fetch_array($qq)){

            $class[] = $row['class_name'];


          }
          $output = "";

          $output .="
                <table class='table table-bordered'>
                  <tr class='bg-dark'>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Class</th>
                    <th>Action</th>
                  </tr>
                ";

          foreach ($class as $key => $value) {
            //echo "Grade ".$value;

            $query = mysqli_query($connect, "SELECT * FROM student WHERE class= '$value'");

            
            

            if (mysqli_num_rows($query) < 0) {
              $output .="
                  <tr>
                    <td class='text-center' colspan='9'>No student offering this subject</td>
                  </tr>
              ";
            }else{
              while ($rows = mysqli_fetch_array($query)) {
                $output .="
                <tr>
                  <td>".$rows['st_id']."</td>
                  <td>".$rows['firstname']."</td>
                  <td>".$rows['lastname']."</td>
                  <td>".$rows['class']."</td>
                  <td>
                    <a href='view_student_details.php?id=".$rows['st_id']."'><button class='btn btn-info'>View</button></a>
                  </td>
                </tr>


                ";
            }

            }

            
            

          }

          $output .="
        
         </table> 
       
        ";
          echo $output;


          ?>

        </div>
      </div>
  </section>

<?php include("footer.php"); ?>
</body>
</html>