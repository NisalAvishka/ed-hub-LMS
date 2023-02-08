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
        <div class="row d-flex justify-content-center">
        <div class="show_image col-md-6 ">
      
 
             <?php 

                  include("../includes/connection.php");

              

                  $teacher = $_SESSION['teacher'];


                  $query = mysqli_query($connect, "SELECT * FROM image_gallery ORDER BY img_id");


                  $output = "";

                  if (mysqli_num_rows($query) < 1) {
                    $output .="

                    <div class='my-5'>

                    <h5 class='text-center'>No Images yet</h5>

                    </div>



                    ";
                  }else{
                    while ($rows = mysqli_fetch_array($query)) {

                      if ($rows['image']!="") {
                        $file = "
                        <div class='row d-flex justify-content-center'>
                          <div class='col-md-12'>
                            <img src='../student/imgs/".$rows['image']."' class='col-md-12'>
                          </div>
                        </div>

                        ";
                      }else{
                        $file = "";

                      }
                      
                      $output .="
                         <div class='my-5 shadow-sm py-3' style='border:1px solid gray'>
                           <h5> <i class='fa-regular fa-user mx-2 '></i> ".$rows['firstname']." ".$rows['lastname']."</h5>
                           <p class='mx-2'>Grade ".$rows['class']."</P>
                           <p><i class='fa-solid fa-earth-americas mx-2'></i>".$rows['date_posted']."</p>
                           <h4 class='text-center'>".$rows['title']."</h4>
                           <p class='text-center'>".$rows['description']."</p>
                           $file
                           

                         </div>
                      ";
                    }
                  }


                  echo $output;



                  ?>
              </div>
          </div>
      </div>
  </section>

<?php include("footer.php"); ?>
</body>
</html>