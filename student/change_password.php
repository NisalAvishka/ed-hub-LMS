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
            <div class="col-sm-6">
              <h4 class="text-center">Change Password</h4>
                <div class="result"></div>

              <form method="post" id="change_password">
                <label>Old Password</label>
                <input type="password" name="old" class="form-control" placeholder="Enter Old Password" autocomplete="off">

                <label>New Password</label>
                <input type="password" name="new" class="form-control" placeholder="Enter New Password" autocomplete="off">

                <label>Confirm Password</label>
                <input type="password" name="confirm" class="form-control" placeholder="Confirm Password" autocomplete="off">

                <input type="submit" name="change" value="Change Password" class="btn btn-success my-3" id="change">
              </form>
              
            </div>
          </div>
        </div>
      </div>
  </section>

<?php include("footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function() {
    $("#change").click(function(e) {
      e.preventDefault();
      
      $.ajax({
        url: "ajax/change_password.php",
        method: "POST",
        data:$("#change_password").serialize(),
        success:function(data){
          $(".result").html(data);
        }
      });
    });
  });
  
</script>
</body>
</html>