<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" role="button" href="#">
          <i class="fas fa-bars"></i>
        </a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="index3.html">
          Home
        </a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="#">
          Contact
        </a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">

        <input type="search" placeholder="Search" aria-label="Search" class="form-control form-control-navbar">

        <div class="input-group-append">
          <button type="submit" class="btn btn-navbar">
            <i class="fas fa-search"></i>
          </button>
        </div>

      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>

          <span class="badge badge-danger navbar-badge">3</span>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a class="dropdown-item" href="#">
            <!-- Message Start -->
            <div class="media">
              <img src="<?= $site_url ?>/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">

              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel

                  <span class="float-right text-sm text-danger">
                    <i class="fas fa-star"></i>
                  </span>
                </h3>

                <p class="text-sm">
                  Call me whenever you can...
                </p>

                <p class="text-sm text-muted">
                  <i class="far fa-clock mr-1"></i> 4 Hours Ago
                </p>
              </div>
            </div>
            <!-- Message End -->
          </a>

          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="#">
            <!-- Message Start -->
            <div class="media">
              <img src="<?= $site_url ?>/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">

              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce

                  <span class="float-right text-sm text-muted">
                    <i class="fas fa-star"></i>
                  </span>
                </h3>

                <p class="text-sm">
                  I got your message bro
                </p>

                <p class="text-sm text-muted">
                  <i class="far fa-clock mr-1"></i> 4 Hours Ago
                </p>
              </div>
            </div>
            <!-- Message End -->
          </a>

          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="#">
            <!-- Message Start -->
            <div class="media">
              <img src="<?= $site_url ?>/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">

              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester

                  <span class="float-right text-sm text-warning">
                    <i class="fas fa-star"></i>
                  </span>
                </h3>

                <p class="text-sm">
                  The subject goes here
                </p>

                <p class="text-sm text-muted">
                  <i class="far fa-clock mr-1"></i> 4 Hours Ago
                </p>
              </div>
            </div>
            <!-- Message End -->
          </a>

          <div class="dropdown-divider"></div>

          <a class="dropdown-item dropdown-footer" href="#">
            See All Messages
          </a>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>

          <span class="badge badge-warning navbar-badge">15</span>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages

            <span class="float-right text-muted text-sm">3 mins</span>
          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests

            <span class="float-right text-muted text-sm">12 hours</span>
          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports

            <span class="float-right text-muted text-sm">2 days</span>
          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item dropdown-footer">
            See All Notifications
          </a>
        </div>
      </li>

      <li class="nav-item">
        <a title="Logout" class="nav-link" href="../logout.php">
          Logout

          <i class="fa fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link" href="<?= $site_url ?>">
      <img
        src="../dist/img/AdminLTELogo.png"
        alt="AdminLTE Logo"
        style="opacity: .8"
        class="brand-image img-circle elevation-3">

      <span class="brand-text font-weight-light">Teacher Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!--
            Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library
          -->
          <li class="nav-item">
            <a class="nav-link" href="<?= $site_url ?>/teacher/dashboard.php">
              <i class="nav-icon fas fa-tachometer-alt"></i>

              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link" href="#">
              <i class="nav-icon fas fa-users"></i>

              <p>
                Manage Classes

                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link" href="<?= $site_url ?>/teacher/courses.php">
                  <i class="far fa-circle nav-icon"></i>

                  <p>Courses</p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?=$site_url?>/teacher/subjects.php">
                  <i class="far fa-circle nav-icon"></i>

                  <p>Subjects</p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?=$site_url?>/teacher/lessons.php">
                  <i class="far fa-circle nav-icon"></i>

                  <p>Lessons</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link" href="#">
              <i class="nav-icon fas fa-users"></i>

              <p>
                Manage Class Routines

                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link" href="<?= $site_url ?>/teacher/periods.php">
                  <i class="far fa-circle nav-icon"></i>

                  <p>Periods</p>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?= $site_url ?>/teacher/timetable.php">
                  <i class="far fa-circle nav-icon"></i>

                  <p>Time Table</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link" href="#">
              <i class="nav-icon fas fa-users"></i>

              <p>
                Manage Examinations

                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link" href="#">
              <i class="nav-icon fas fa-users"></i>

              <p>
                Manage Attendance

                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link" href="<?= $site_url ?>/teacher/attendance.php">
                  <i class="far fa-circle nav-icon"></i>

                  <p>Attendance</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link" href="#">
              <i class="nav-icon fas fa-users"></i>

              <p>
                Fee Details

                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link" href="<?= $site_url ?>/teacher/fee-details.php">
                  <i class="far fa-circle nav-icon"></i>

                  <p>Fee Details</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link" href="#">
              <i class="nav-icon fas fa-users"></i>

              <p>
                Study Materials

                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link" href="<?= $site_url ?>/teacher/study-materials.php">
                  <i class="far fa-circle nav-icon"></i>

                  <p>Study Materials</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link" href="#">
              <i class="nav-icon fas fa-users"></i>

              <p>
                Manage Events

                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link" href="#">
              <i class="nav-icon fas fa-users"></i>

              <p>
                Communications

                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">