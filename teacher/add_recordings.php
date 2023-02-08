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
          <div class="row d-flex justify-content-center">
            <div class="col-md-6">
              <h3 class="text-center my-3">Add Recordings/Notes</h3>
              <div class="result"></div>
              <form method="post" id="add_recording" enctype="multipart/form-data">
                
                <label>Date</label>
                <input type="date" name="lec_date" class="form-control">

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

                <label>Recording link</label>
                <input type="text" name="link" class="form-control">

                <label>Lecture Note</label>
                <input type="file" name="file" class="form-control">

                <input type="submit" name="add_recording" value="Add Recordings/Notes" class="btn btn-success my-3" >


              </form>
            </div>
          </div>
        </div>  

      </div>
  </section>

<?php include("footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){

    $("#add_recording").on("submit",function(e){
      e.preventDefault();


      $.ajax({
        url: "ajax/add_recordings.php",
        method: "POST",
        data: new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        success:function(data){
          $(".result").html(data);
        }
      });
    });




  });
</script>
</body>
</html>