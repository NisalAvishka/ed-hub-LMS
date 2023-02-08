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

        <div class="col-md-12">
          <div class="row d-flex justify-content-center">
            <div class="col-md-5">
              <h3 class="text-center my-5"><i class="fa-solid fa-image"></i> Add Image</h3>
              <div class="result"></div>
              <form method="post" id="image_form">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Add the tittle">

                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>

                <label>Add Image</label>
                <input type="file" name="file" class="form-control">

                <input type="submit" name="post" id="post" class="btn btn-info col-md-12 my-5">
              </form>
            </div>
          </div>
      </div>
  </section>

<?php include("footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function(){

    $("#image_form").on("submit",function(e){
      e.preventDefault();
     

      $.ajax({

        url: "ajax/add_image.php",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success:function(data){
          $(".result").html(data);
        }
      });
    });

  });

</script>
</body>
</html>