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
          <h3 class="text-center my-3">View Attendance</h3>
          <form method="post" enctype="multipart/form-data" id="view_attendance">
            <div class="row d-flex justify-content-center">
              <div class="col">
                <label>Class</label>
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

              <div class="col">

                <label>Date</label>
                <input type="text" name="date" class="form-control" placeholder="dd/mm/yyyy" autocomplete="off">
              </div>

              <div class="col"></div>
              <div class="col"></div>
            </div>

              <div class="row d-flex justify-content-center">
                 <div class="col">
                 <input type="submit" name="view_attendance" id="view_attendance" value="View Attendance" class="btn btn-success my-3">
               </div>
              </div>
          </form>
      </div>

      <div class="row d-flex justify-content-center">
        <div class="view"></div>
      </div>

      </div>
  </section>

<?php include("footer.php"); ?>
<?php include("footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){


    $("#view_attendance").on("submit",function(e){
      e.preventDefault();

      $.ajax({
        url: "ajax/view_attendance.php",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success:function(data){
          $(".view").html(data);
        }
      });
          });
  });
</script>
</body>
</html>