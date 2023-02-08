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
        
        <div class="row d-flex justify-content-center">
          <div class="col-md-5">
            <h2 class="text-center my-3">View Schedule</h2>
          </div>
        </div>

        <div class="row d-flex justify-content-center">
          <div class="col-md-5">
            <select class="form-control" id="schedule">
              <option value="">All</option>
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
        </div>
        <div class="row d-flex justify-content-center">
          <div class="result"></div>
        </div>
        <div class="row d-flex justify-content-center">
        <a class="btn btn-danger my-3 clickable" href="ajax/delete_schedule.php">Clear Schedule</a>
        </div>
      </div>
  </section>

<?php include("footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){

    $("#schedule").change(function() {
      var value = $("#schedule").val();


      $.ajax({
        url: 'ajax/schedule.php',
        method: 'POST',
        data: {value:value},
        success:function(data){
          $(".result").html(data);
        }
      });
      
    });

  });
</script>

<script type="text/javascript">
$('.clickable').click(function() {
   alert("Schedule cleared successfully");
});
</script>

</body>
</html>