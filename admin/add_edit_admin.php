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
              <h3 class="text-center my-3">Add New Admin</h3>
                <div id="add_result"></div>
              <form method="post" id="add_admin_form">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter Username" class="form-control" autocomplete="off">

                <label>Password</label>
                <input type="Password" name="password" placeholder="Enter password" class="form-control" autocomplete="off">

                <label>Confirm Password</label>
                <input type="Password" name="confirm_password" placeholder="Confirm password" class="form-control" autocomplete="off">

                <label>First Name</label>
                <input type="text" name="firstname" placeholder="Enter First Name" class="form-control" autocomplete="off">

                <label>Last Name</label>
                <input type="text" name="lastname" placeholder="Enter Last Name" class="form-control" autocomplete="off">

                <label>E-mail</label>
                <input type="email" name="email" placeholder="Enter E-mail" class="form-control" autocomplete="off">

                <label>Mobile Number</label>
                <input type="text" name="phone" placeholder="Enter Mobile Number" class="form-control" autocomplete="off">

                <input type="submit" name="add_admin" value="Add New Admin" class="btn btn-success my-3" id="add_admin">
                
              </form>

              
            </div>
            
          </div>
          
        </div>
        <br><br>
        <h3 class="text-center my-3">List of Admins</h3>
        <div id="display_admin"></div>
      </div>
  </section>

<?php include("footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function(){
    display_admin();
    function display_admin(){
      var action = "display";

      $.ajax({
        url: "ajax/display_admin.php",
        method: "POST",
        data:{action:action},
        success:function(data){
          $("#display_admin").html(data);

        }
      });
    }


    $("#add_admin").click(function(e){
      e.preventDefault();

       $.ajax({
        url: "ajax/add_edit_admin.php",
        method: "POST",
        data: $("#add_admin_form").serialize(),
        success:function(data){
          $("#add_result").html(data);
          display_admin();
        }       
      })
    });


    

    $(document).on("click",".remove",function(){
      var id = $(this).attr("id");
      var action = "remove";

      $.ajax({
        url: "ajax/display_admin.php",
        method: "POST",
        data:{id:id,action:action},
        success:function(data){
          display_admin();
        }
      });
    });
  });
</script>
</body>
</html>