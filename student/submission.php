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
        <div class="col-md-7 shadow-sm">
            <?php

            $student = $_SESSION['student'];
            $q = mysqli_query($connect, "SELECT * FROM student WHERE username ='$student'");
            $r = mysqli_fetch_array($q);

            $fname = $r['firstname'];
            $lname = $r['lastname'];
            $id = $_GET['id'];

            $qq = "SELECT * FROM submission WHERE post_id='$id' AND firstname='$fname'";

            $rr = mysqli_query($connect, $qq);

            $submit = "";

            $sub_date = "";




            if (mysqli_num_rows($rr) > 0) {
              $submit = "<p class='text-center alert alert-success'>Submitted</p>";

              while ($sub_row = mysqli_fetch_array($rr)) {
                $sub_date = $sub_row['date_submitted'];
              }
            }else{
              $submit = "<p class='text-center alert alert-danger'>Not Yet</P>";
              $sub_date = "Have not upload";
            }


             include("../includes/connection.php");

             $query = "SELECT * FROM post_assignment WHERE asign_id='$id'";
             $res = mysqli_query($connect, $query);


             if (mysqli_num_rows($res) < 1) {
               echo "<h2 class='text-center my-5'>No Post Yet</h2>";
             }else{
              while ($row = mysqli_fetch_array($res)) {
                echo "
                     <a href='../teacher/post/".$row['file']."' download='".$row['file']."'><p class='my-2'><i class='fa fa-file-pdf mx-2'></i> ".$row['file']."</p></a>
                     <table class='my-5 table table-bordered'>
                      <tr>
                          <td>Type</td>
                          <td>".$row['type']."</td>
                        </tr>
                        <tr>
                          <td>Due Date</td>
                          <td>".$row['due_date']."</td>
                        </tr>
                        <tr>
                          <td>Class</td>
                          <td>Grade ".$row['class']."</td>
                        </tr>
                        <tr>
                          <td>Subject</td>
                          <td>".$row['subject']."</td>
                        </tr>
                        <tr>
                          <td>Date posted</td>
                          <td>".$row['date_posted']."</td>
                        </tr>
                        <tr>
                          <td>Submission</td>
                          <td>".$submit."</td>
                        </tr>
                        <tr>
                          <td>Submitted date</td>
                          <td>".$sub_date."</td>
                        </tr>
                      </table>

                ";
              }

             }

          ?>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Submission
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Submission</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="upload_result"></div>
                  <form method="post" id="submit_form" enctype="multipart/form-data">
                    <label>Select File To Upload</label>
                    <input type="file" name="file" class="form-control">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" name="submit" class="btn btn-info my-2" value="submit">
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        </div>
        </div>
      </div>
  </section>

<?php include("footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){

    $("#submit_form").on("submit", function(e){
      e.preventDefault();



      $.ajax({
      url: "ajax/submission.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success:function(data){
        $(".upload_result").html(data);

      }


    });
    });



  });
</script>


</body>
</html>