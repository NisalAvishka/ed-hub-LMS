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
          <div class="row">
            <div class="col-md-6">
              <h4 class="text-center">Add New Class</h4>

              <form method="post">
                <label>Class Name</label>
                <input type="text" name="class_name" id="class_name" placeholder="Enter Class Name" class="form-control" autocomplete="off">

                <input type="submit" name="add_class" id="add_class" class="btn btn-success my-3" value="Add New Class">
              </form>

              <div class="class_result"></div>
              
            </div>
            <div class="col-md-6">
            <h4 class="text-center">Add New Subject</h4>

            <form method="post">
              <label>Subject Name</label>
              <input type="text" name="subject_name" id="subject_name" placeholder="Enter Subject Name" class="form-control" autocomplete="off">
              <input type="submit" name="add_subject" id="add_subject" class="btn btn-success my-3" value="Add New Subject">
            </form>
            <div class="subject_result"></div>
              
            </div>
          </div>
          
        </div>
      </div>
  </section>

<?php include("footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){
    show_class();
    function show_class(){

      var action = "show";

      $.ajax({
        url: "ajax/add_class.php",
        method: "POST",
        data: {action:action},
        success:function(data){
          $(".class_result").html(data);
        }

      });
    }

    $("#add_class").click(function(e){
      e.preventDefault();

      var action = "add";
      var name = $("#class_name").val();

      $.ajax({
        url: "ajax/add_class.php",
        method: "POST",
        data: {action:action,name:name},
        success:function(data){
          show_class();


        }

      });
    });

    $(document).on("click",".remove",function(){
      var id = $(this).attr("id");
      var action = "remove";

      $.ajax({
        url: "ajax/add_class.php",
        method: "POST",
        data: {action:action,id:id},
        success:function(data){
          show_class();

        }

      });
    });

    show_subject();

    function show_subject(){
      var action = "show";

      $.ajax({
        url: "ajax/add_subject.php",
        method: "POST",
        data: {action:action},
        success:function(data){
          $(".subject_result").html(data);
          

        }


      });

    }

    $("#add_subject").click(function(e){
      e.preventDefault();

      var name = $("#subject_name").val();
      var action = "add";

      $.ajax({
        url: "ajax/add_subject.php",
        method: "POST",
        data: {name:name,action:action},
        success:function(data){
          show_subject();

        }


      });
    });

    $(document).on("click",".s_remove",function(){
      var id = $(this).attr("id");
      var action = "remove";

      $.ajax({
        url: "ajax/add_subject.php",
        method: "POST",
        data: {action:action,id:id},
        success:function(data){
          show_subject();

        }

      });
    });

  });
</script>
</body>
</html>