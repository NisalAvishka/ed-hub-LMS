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
          <img src="5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['admin']; ?></a>
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
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_edit_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Registration</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="update_teachers.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Registration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add_student.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Registration</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="add_parent.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Parent Registration</p>
                </a>
              </li>

            </ul>
          </li> 




          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Classes and Subjects
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_class_subject.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Classes and Subjects</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Classes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php 
              include("../includes/connection.php");
              $query = mysqli_query($connect , "SELECT * FROM class ORDER BY cl_id ASC");


              if (mysqli_num_rows($query) < 1) {
                echo '
                 <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>No class yet</p>
                </a>
              </li

                ';
              }


              while ($row = mysqli_fetch_array($query)) {
                echo '
                 <li class="nav-item">
                <a href="class.php?id='.$row['cl_id'].'" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade '.$row['name'].'</p>
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
                Functions
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

              <li class="nav-item">
                <a href="view_attendance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Attendance</p>
                </a>
              </li>

            </ul>
          </li> 

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Parents
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="parents_meeting.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Schedule Meeting</p>
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