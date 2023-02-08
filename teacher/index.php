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

        <div class="row">
          <div class="col-lg-3 col-6">
            <!--small box-->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 class="#">1</h3>
                  <p>My Profile</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user"></i>
              </div>
              <a href="profile.php" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        

        <div class="col-lg-3 col-6">
            <!--small box-->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 class="total_chat">Chat</h3>
                  <p>Messages</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-envelope"></i>
              </div>
              <a href="chat.php" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          </div>

      </div>
  </section>

<?php include("footer.php"); ?>
</body>
</html>