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
              <h3 class="text-center my-3">Schedule a live class</h3>
              <div class="result"></div>
              <form method="post" id="sch_class" enctype="multipart/form-data">
                
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Title" autocomplete="off">

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

                <label>Time slot</label>
                <select name="time" class="form-control">
                  <option value="">Select Time Slot</option>
                  <option value="07:50-08:30">07:50-08:30</option>
                  <option value="08:30-09:10">08:30-09:10</option>
                  <option value="09:10-09:40">09:10-09:40</option>
                  <option value="09:40-10:30">09:40-10:30</option>
                  <option value="10:50-11:30">10:50-11:30</option>
                  <option value="11:30-12:10">11:30-12:10</option>
                  <option value="12:10-12:50">12:10-12:50</option>
                  <option value="12:50-01:30">12:50-01:30</option>

                </select>

                <label>Joining Link</label>
                <input type="text" name="link" placeholder="Enter Joining Link" autocomplete="off" class="form-control">

                <input type="submit" name="sch_class" value="Schedule the class" class="btn btn-success my-3" >


              </form>
            </div>
          </div>
        </div>  

      </div>
  </section>

<?php include("footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){

    $("#sch_class").on("submit",function(e){
      e.preventDefault();


      $.ajax({
        url: "ajax/live_class.php",
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