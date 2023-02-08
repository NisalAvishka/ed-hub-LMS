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
        
        <div class="row d-flex justify-content-center">
          <div class="col-md-5">
            <h2 class="text-center my-5 "><i class="fa-brands fa-whatsapp"></i> Chat - Powered by Ed-hub</h2>
            <a href="add_message.php" class="btn btn-success my-3">Add Message</a>
          </div>
        </div>

        <div class="row d-flex justify-content-center">
          <div class="col-md-5">
            <select class="form-control" id="change">
              <option value="all">All</option>
              <?php 

              include("../includes/connection.php");

              $student = $_SESSION['student'];

              $query = mysqli_query($connect, "SELECT * FROM student WHERE username ='$student'");

              $rows = mysqli_fetch_array($query);

              $class = $rows['class'];

              $get_subject = mysqli_query($connect, "SELECT * FROM my_subject WHERE class_name = '$class'");

              while ($show_subject = mysqli_fetch_array($get_subject)) {
                echo '
                      <option value='.$show_subject['subject_name'].'>'.$show_subject['subject_name'].'</option>

                ';
              }

              ?>
              

            </select>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="result col-md-5"></div>
        </div>
      </div>
  </section>

<?php include("footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){

    $("#change").change(function() {
      var value = $("#change").val();

      $.ajax({
        url: 'ajax/chat.php',
        method: 'POST',
        data: {value:value},
        success:function(data){
          $(".result").html(data);
        }
      });
      
    });

  });
</script>

</body>
</html>