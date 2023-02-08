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
          
          <?php

          $id = $_GET['id'];
          include("../includes/connection.php");

          $query = mysqli_query($connect, "SELECT * FROM student WHERE st_id='$id'");

          $row = mysqli_fetch_array($query);

           ?>
           <h2 class="text-center"><?php echo $row['firstname']." ".$row['lastname']."'s Details"; ?></h2>

           <table class="table table-bordered">
            <tr>
              <td>Username</td>
              <td><?php echo $row['username'] ?></td>
            </tr>

            <tr>
              <td>Firstname</td>
              <td><?php echo $row['firstname'] ?></td>
            </tr>

            <tr>
              <td>Lastname</td>
              <td><?php echo $row['lastname'] ?></td>
            </tr>

            <tr>
              <td>Address</td>
              <td><?php echo $row['address'] ?></td>
            </tr>

            <tr>
              <td>E-mail</td>
              <td><?php echo $row['email'] ?></td>
            </tr>

            <tr>
              <td>Mobile Number</td>
              <td><?php echo $row['phone'] ?></td>
            </tr>

            <tr>
              <td>Gender</td>
              <td><?php echo $row['gender'] ?></td>
            </tr>

            <tr>
              <td>Class</td>
              <td><?php echo "Grade ".$row['class'] ?></td>
            </tr>
             


           </table>

        </div>
      </div>
  </section>

<?php include("footer.php"); ?>
</body>
</html>