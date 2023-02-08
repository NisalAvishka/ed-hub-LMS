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
          <h2 class="text-center"><?php echo $_GET['name']; ?></h2>

          <div class="d-flex justify-content-center my-5">
            <div class="col-md-7">
              <h3 class="text-center ">Assignments/Homework</h3>

          <?php

           $subject = $_GET['name'];
             

             include("../includes/connection.php");

              $student = $_SESSION['student'];

              $q = mysqli_query($connect, "SELECT * FROM student WHERE username ='$student'");

              $rowx = mysqli_fetch_array($q);

              $class = $rowx['class'];


             $query = "SELECT * FROM post_assignment WHERE subject='$subject' AND class='$class'";
             $res = mysqli_query($connect, $query);


             if (mysqli_num_rows($res) < 1) {
               echo "<h2 class='text-center my-5'>No Post Yet</h2>";
             }else{
              while ($row = mysqli_fetch_array($res)) {

                $student = $_SESSION['student'];
                $id = $row['asign_id'];

                $qq = mysqli_query($connect, "SELECT * FROM student WHERE username = '$student'");

                $ro = mysqli_fetch_array($qq);

                $fname = $ro['firstname'];

                $q = mysqli_query($connect, "SELECT * FROM submission WHERE post_id='$id' AND firstname='$fname'");

                $submit = "";

                if (mysqli_num_rows($q) > 0) {
                  $submit = "<p class='text-center alert alert-success'>Submitted</p>";
                }else{
                  $submit = "<p class='text-center alert alert-danger'>Not Submitted</p>";
                }

                echo "
                   <div class='col-md-12 shadow-sm'>
                     <a href='../teacher/post/".$row['file']."' download='".$row['file']."'><p class='my-2'><i class='fa fa-file-pdf mx-2'></i> ".$row['file']."</p></a>
                     <p>".$submit."</p>
                     <a href = 'submission.php?id=".$row['asign_id']."'><button class='btn btn-info my-2'>Submit ".$row['type']."</button></a>
                  </div>

                ";
              }

             }

          ?>
          </div>
          </div>

          <div class="d-flex justify-content-center my-5">
            <div class="col-md-7">
              <h3 class="text-center">Learning Resources</h3>
              <?php 

              $subject = $_GET['name'];

              include("../includes/connection.php");

              $student = $_SESSION['student'];

              $q = mysqli_query($connect, "SELECT * FROM student WHERE username ='$student'");

              $rowy = mysqli_fetch_array($q);

              $class = $rowy['class'];

              $query = "SELECT * FROM note WHERE subject='$subject' AND class='$class'";
              $res = mysqli_query($connect, $query);

              $output = "";

              $output .="
                  <table class= 'table table-bordered'>
                    <tr>
                      <th>Date</th>
                      <th> Recording Link</th>
                      <th>File</th>
                    </tr>
                    ";

            while ($rows = mysqli_fetch_array($res)) {

                $output .= "
                    <tr>
                      <td>".$rows['lecdate']."</td>
                      <td><a href='".$rows['link']."'  target='_blank'>".$rows['link']."</a></td>
                      <td><a href='../teacher/note/".$rows['file']."' download='".$rows['file']."'><p class='my-2'><i class='fa fa-file-pdf mx-2'></i> ".$rows['file']."</p></a></td>

                ";

              }
              echo $output;
             


              ?>
            </div>
          </div>

        </div>
      </div>
  </section>

<?php include("footer.php"); ?>
</body>
</html>