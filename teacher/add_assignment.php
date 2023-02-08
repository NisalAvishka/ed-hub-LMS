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
              <button type="button" class="btn btn-primary col-md-12" data-toggle="modal" data-target="#exampleModalLong">Post Homework/Assignment
              </button>
            </div>
          </div>
        </div>

        <div class="row d-flex justify-content-center">
          <div class="col-md-5 my-5">
            <select id="type_of" class="form-control">
              <option value="">Select post type</option>
            <option value="assignment">Assignment</option>
            <option value="homework">Homework</option>
          </select>
          </div>
        </div>

        <div class="row d-flex justify-content-center">
          <div class="col-md-6 show_result"></div>
        </div>
      </div>
  </section>

  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Post Homework/Assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="post_assign" enctype="multipart/form-data">
          <div class="post_result"></div>
          <label>Select Post Type</label>
          <select name="type" class="form-control">
            <option value="">Select post type</option>
            <option value="assignment">Assignment</option>
            <option value="homework">Homework</option>
          </select>

          <label>Due Date</label>
          <input type="date" name="due_date" class="form-control">

          <label>PDF File</label>
          <input type="file" name="file" class="form-control">

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


          <input type="submit" name="post" id="post" class="btn btn-info col-md-12 my-3" value="POST">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php include("footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function(){

    $("#type_of").change(function(){
      var type = $("#type_of").val();


      $.ajax({
        url: "ajax/show_assignment.php",
        method: "POST",
        data: {type:type},
        success:function(data){
          $(".show_result").html(data);
        }
      });
    });


    $("#post_assign").on("submit",function(e){
      e.preventDefault();


      $.ajax({
        url: "ajax/post_assignment.php",
        method: "POST",
        data: new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        success:function(data){
          $(".post_result").html(data);
        }
      });
    });
  });
</script>
</body>
</html>