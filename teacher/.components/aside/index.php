<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <a class="brand-link" href="<?= $site_url ?>">
    <img
      src="<?= $site_url ?>/assets/img/AdminLTELogo.png"
      alt="AdminLTE Logo"
      style="opacity: .8"
      class="brand-image img-circle elevation-3">

    <span class="brand-text font-weight-light">Teacher Panel</span>
  </a>

  <div class="sidebar">

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!--
          Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library
        -->
        <li class="nav-item">
          <a class="nav-link" href="<?= $site_url ?>/teacher">
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
              <a class="nav-link" href="<?=$site_url?>/teacher/lessons.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Lessons</p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=$site_url?>/teacher/subjects.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Subjects</p>
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
              <a class="nav-link" href="<?= $site_url ?>/teacher/.components/routines/.components/periods">
                <i class="far fa-circle nav-icon"></i>

                <p>Periods</p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/teacher/.components/routines/.components/timetable">
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
              <a class="nav-link" href="<?= $site_url ?>/teacher/.components/study-materials">
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

  </div>
</aside>