<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->
  <a href="<?= $site_url ?>" class="brand-link">
    <img src="../assets/img/AdminLTELogo.png" alt="AdminLTE Logo" style="opacity: .8" class="brand-image img-circle elevation-3">

    <span class="brand-text font-weight-light">Parent Panel</span>
  </a>

  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!--
          Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library
        -->
        <li class="nav-item">
          <a href="<?= $site_url ?>parent/dashboard.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>

            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>

            <p>
              Manage Classes

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>parent/courses.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Courses</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>parent/subjects.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Subjects</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>parent/lessons.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Lessons</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>

            <p>
              Manage Class Routines

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>parent/periods.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Periods</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>parent/timetable.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Time Table</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>

            <p>
              Manage Examinations

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>

            <p>
              Manage Attendance

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>parent/attendance.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Attendance</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>

            <p>
              Fee Details

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>parent/fee-details.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Fee Details</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>

            <p>
              Study Materials

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>parent/study-materials.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Study Materials</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>

            <p>
              Manage Events
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>

            <p>
              Communications
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        </li>
      </ul>
    </nav>

  </div>
</aside>