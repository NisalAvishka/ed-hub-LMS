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
        <?php 

        include("../includes/connection.php");

        $id = $_GET['id'];

        $query = mysqli_query($connect, "SELECT * FROM submission WHERE post_id='$id'");

        $output = "";

        $output .="
          <table class='table table-bordered'>
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Class</th>
              <th>File</th>
              <th>Date Submitted</th>
            </tr>
        ";

        if (mysqli_num_rows($query) < 1) {
          $output .= "
                <tr>
                  <td class='text-center' colspan='6'>No Submissions Yet</td>
                </tr>

          ";
        }else{

          while ($row = mysqli_fetch_array($query)) {
            $output .="
              <tr>
              <td>".$row['subm_id']."</td>
              <td>".$row['firstname']."</td>
              <td>".$row['lastname']."</td>
              <td>".$row['class']."</td>
              <td><i class='fa fa-file-pdf mx-2'></i><a href='../student/submit/".$row['file']."' download='".$row['file']."'>".$row['file']."</a></td>
              <td>".$row['date_submitted']."</td>
              </tr>
            ";
          }
        }


        echo $output;

        ?>

      </div>
  </section>

<?php include("footer.php"); ?>
</body>
</html>