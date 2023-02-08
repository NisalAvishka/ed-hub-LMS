<?php include("header.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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



        <h2 class="text-center my-5 "><i class="fa-brands fa-instagram"></i> Image Gallery - Powered by Ed-hub</h2>
        <div class="col-md-12 text-center">
        <a href="add_image.php" class="btn btn-success my-3">Add Image</a>
        </div>
        <div class="row d-flex justify-content-center">
        <div class="show_image col-md-6 "></div>
      </div>
 


      </div>
  </section>

<?php include("footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){
    show();

    function show(){

      $.ajax({
        url: "ajax/show_image.php",
        method: "POST",
        success:function(data){
          $(".show_image").html(data);
        }
      });

    }
  });
</script>
</body>
</html>