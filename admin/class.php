<?php include("header.php");

include("../includes/connection.php");






 ?>
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
        <?php 
        $id = $_GET['id'];

        $query = mysqli_query($connect, "SELECT * FROM class WHERE cl_id ='$id'");

        $row = mysqli_fetch_array($query);


        ?>

        <div class="modal fade" id="level_100" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Subjects to Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="level_100_add_result"></div>
                <?php 

                $level_100_query = mysqli_query($connect, "SELECT * FROM subject");

                $output ="";

                $output .="
                  <table class= 'table table-bordered'>
                      <tr>
                        <th>Subject ID</th>
                        <th>Subject Name</th>
                        <th>Action</th>
                ";

                while ($level_100 = mysqli_fetch_array($level_100_query)) {

                  $output .="
                      <tr>
                        <td>".$level_100['sb_id']."</td>
                        <td>".$level_100['name']."</td>
                        <td>
                           <button class='btn btn-warning col-md-12 add_level_100' program='".$row['name']."' 
                           subject='".$level_100['name']."' level='100'>Add</button>
                        </td>
                      </tr>
                  ";
                  
                }

                $output .= "</table>";

                echo $output;


                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>





        <div class="col-md-10 level_100">
        <h1 class="text-center">Grade <?php echo $row['name'] ?></h1>
        <h3 class="text-center">Subjects of Grade <?php echo $row['name'] ?></h3>

        <div class="row d-flex justify-content-center my-4">
          <div class="col-md-8">
            <div class="level_subject_result"></div>
            <input type="hidden" name="current_class" id="current_class" value="<?php echo $row['name']; ?>">
          </div>
        </div>
          <div class="row d-flex justify-content-center">
            <div class="col-md-1.5">
              <input type="button" name="add_subject" class="btn btn-info my-2" value="Add New Subject" data-toggle="modal" 
              data-target="#level_100">
     
            </div>
            
          </div>
        </div>

      </div>
  </section>

<?php include("footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function(){

    show_level_subjects();

    function show_level_subjects(){
      var action = "display";
      var current_class = $("#current_class").val();


      $.ajax({
        url: "ajax/show_subjects.php",
        method: "POST",
        data: {action:action, current_class:current_class},
        success:function(data){
          $(".level_subject_result").html(data);
          

        }
      });
    }

    $(document).on("click",".remove",function(){
      var id = $(this).attr("id");

      $.ajax({
        url: "ajax/remove_subject.php",
        method: "POST",
        data: {id:id},
        success:function(data){
          show_level_subjects();

        }

      });

    });


    $(".add_level_100").click(function(){

      var program = $(this).attr("program");
      var subject = $(this).attr("subject");

      var action = "add";

      $.ajax({

        url: "ajax/add_subject_to_class.php",
        method: "POST",
        data: {program:program,subject:subject,action:action},
        success:function(data){
          $(".level_100_add_result").html(data);

          show_level_subjects();
        }
      });


    });

  });
</script>
</body>
</html>