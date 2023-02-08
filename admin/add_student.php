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
          <h3 class="text-center my-3">Register Students</h3>
          <form method="post" enctype="multipart/form-data" id="students_reg">
            <div class="row d-flex justify-content-center">
            <div class="std-result"></div>
            </div>

            <div class="row d-flex justify-content-center">
              <div class="col">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username" autocomplete="off">
              </div>

              <div class="col">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" autocomplete="off">
              </div>

              <div class="col">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" autocomplete="off">
              </div>
            </div>

            <div class="row d-flex justify-content-center">
              <div class="col">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" autocomplete="off">
              </div>

              <div class="col">
                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" autocomplete="off">
              </div>

              <div class="col">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address" autocomplete="off">
              </div> 
            </div>

            <div class="row d-flex justify-content-center">
              <div class="col">
                <label>E-mail</label>
                <input type="text" name="email" class="form-control" placeholder="Enter E-mail" autocomplete="off">
              </div>

              <div class="col">
                <label>Mobile Number</label>
                <input type="text" name="mobile_number" class="form-control" placeholder="Enter Mobile Number" autocomplete="off">
              </div>

              <div class="col">
                <label>Gender</label>
                <select name="gender" class="form-control">
                  <option value="">Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option> 
                </select>
              </div>
            </div>

            <div class="row d-flex justify-content-center">
              <div class="col">
                <label>Date Of Birth</label>
                <input type="text" name="dob" class="form-control" placeholder="dd/mm/yyyy" autocomplete="off">
              </div>

              <div class="col">
                <label>Select Class</label>
                <select name="class" class="form-control">
                  <option value="">Select Class</option>

                  <?php 

                  include("../includes/connection.php");

                  $query = mysqli_query($connect, "SELECT * FROM class");

                  while ($row = mysqli_fetch_array($query)) {
                    echo "

                         <option value='".$row['name']."'>Grade ".$row['name']."</option>

                    ";

                  }

                  ?>
                </select>
              </div>
              <div class="col"></div>
            </div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-4">
                <input type="submit" name="registerstd" class=" btn btn-success my-3 col-md-4" value="Register Student">
              </div>
            </div> 
          </form>
        </div>
      </div>
  </section>
  




<?php include("footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){


    $("#students_reg").on("submit",function(e){
      e.preventDefault();

      $.ajax({
        url: "ajax/student_reg.php",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success:function(data){
          $(".std-result").html(data);
        }
      });
          });
  });
</script>


</body>
</html>