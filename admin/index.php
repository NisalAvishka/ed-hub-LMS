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
        <div class="row">
          <div class="col-lg-3 col-6">
            <!--small box-->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 class="total_admin">Value</h3>
                  <p>Total Admin</p>
              </div>
              <div class="icon">
                <i class="fa fa-users-cog"></i>
              </div>
              <a href="add_edit_admin.php" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!--small box-->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 class="total_teachers">Value</h3>
                  <p>Total Teachers</p>
              </div>
              <div class="icon">
                <i class="fa fa-users-cog"></i>
              </div>
              <a href="update_teachers.php" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
         <div class="row">
          <div class="col-lg-3 col-6">
            <!--small box-->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 class="total_students">Value</h3>
                  <p>Total Students</p>
              </div>
              <div class="icon">
                <i class="fa fa-users-cog"></i>
              </div>
              <a href="add_student.php" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!--small box-->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 class="total_parents">Value</h3>
                  <p>Total Parents</p>
              </div>
              <div class="icon">
                <i class="fa fa-users-cog"></i>
              </div>
              <a href="add_parent.php" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
            
      </div>
  </section>

<?php include("footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function(){

    $.ajax({
      url: "ajax/index.php",
      method: "POST",
      dataType: "JSON",
      success:function(data){
        $(".total_admin").text(data.total_admin);
        $(".total_teachers").text(data.total_teachers);
        $(".total_students").text(data.total_students);
        $(".total_parents").text(data.total_parents);

      }

    });

  });
  




</script>
</body>
</html>