 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <span class="brand-text font-weight-ligh mx-5">Ed-hub LMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="10.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['student']; ?></a>
        </div>
      </div>

      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
        
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="change_password.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                My Subjects
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php 

              include("../includes/connection.php");

              $student = $_SESSION['student'];

              $query = mysqli_query($connect, "SELECT * FROM student WHERE username ='$student'");

              $row = mysqli_fetch_array($query);

              $class = $row['class'];

              $get_subject = mysqli_query($connect, "SELECT * FROM my_subject WHERE class_name = '$class'");

              while ($show_subject = mysqli_fetch_array($get_subject)) {
                echo '

                <li class="nav-item">
                <a href="my_subject.php?name='.$show_subject['subject_name'].'" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>'.$show_subject['subject_name'].'</p>
                </a>
              </li>

                ';
              }

              ?>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Live class
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="schedule.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Schedule</p>
                </a>
              </li>
            </ul>
          </li>

          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Events
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="chat.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chat</p>
                </a>
              </li>
            </ul>
          </li>





          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Online Magazine
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_image.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Image Gallery</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="view_video.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Video Gallery</p>
                </a>
              </li>
            </ul>
          </li>

         
         


        
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>