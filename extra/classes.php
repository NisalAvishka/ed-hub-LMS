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
          <div class="col">
           <h3 class="mx-5 my-3">List of Classes</h3>
           <div id="display_classes" class="mx-5 my-3"></div>
           <form method="post" enctype="multipart/form-data" id="add_class">
             <label>Add New Grade</label>
             <input type="text" name="add_class" class="form-control col-md-5" placeholder="Enter New Grade" autocomplete="off">
             <input type="submit" name="add_class" class="btn btn-success my-3 col-md-5" value="Add New Grade" id="add_class">
           </form>
           </div>

           <div class="col">
           <h3 class="mx-5 my-3">List of Subjects</h3>
           <div id="display_subjects" class="mx-5 my-3"></div>
           <form method="post" enctype="multipart/form-data" id="add_subject">
             <label class="mx-5">Add New Subject</label>
             <input type="text" name="subject" class="form-control col-md-5 mx-5" placeholder="Enter New Subject" autocomplete="off">
             <input type="submit" name="add_subject" class="btn btn-success my-3 col-md-5 mx-5" value="Add New Subject" id="add_subject">
           </form>
           </div>
      </div>
  </section>

<?php include("footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){
    display_classes();
    function display_classes(){
      var action = "display";

      $.ajax({
        url: "ajax/display_classes.php",
        method: "POST",
        data:{action:action},
        success:function(data){
          $("#display_classes").html(data);

        }
      });
    }
  });

</script>

<script type="text/javascript">
  $(document).ready(function(){
    display_subjects();
    function display_subjects(){
      var action = "display";

      $.ajax({
        url: "ajax/display_subjects.php",
        method: "POST",
        data:{action:action},
        success:function(data){
          $("#display_subjects").html(data);

        }
      });
    }

    $(document).on("click","#add_subject",function(){
      var id = $(this).attr("id");
      var action = "input";

      $.ajax({
        url: "ajax/display_subjects.php",
        method: "POST",
        data:{id:id,action:action},
        success:function(data){
          display_subjects();
        }
      });
    });
  });

</script>
</body>
</html>