<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <a class="brand-link" href="<?= $site_url ?>">
    <img
      src="<?= $site_url ?>/assets/img/AdminLTELogo.png"
      alt="AdminLTE Logo"
      style="opacity: .8"
      class="brand-image img-circle elevation-3"
    >

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
            <span class="nav-icon fas fa-tachometer-alt"></span>

            <span>Dashboard</span>
          </a>
        </li>

        <!-- <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-users"></span>

            <p>
              Manage Classes

              <span class="fas fa-angle-left right"></span>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/teacher/courses.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Courses</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=$site_url?>/teacher/lessons.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Lessons</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=$site_url?>/teacher/subjects.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Subjects</span>
              </a>
            </li>
          </ul>
        </li> -->

        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-users"></span>

            <p>
              Manage Class Routines

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/teacher/.components/routines/.components/periods">
                <span class="far fa-circle nav-icon"></span>

                <span>Periods</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/teacher/.components/routines/.components/timetable">
                <span class="far fa-circle nav-icon"></span>

                <span>Time Table</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-users"></span>

            <p>
              Manage Examinations

              <span class="fas fa-angle-left right"></span>
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-users"></span>

            <p>
              Manage Attendance

              <span class="fas fa-angle-left right"></span>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/teacher/attendance.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Attendance</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-users"></span>

            <p>
              Fee Details

              <span class="fas fa-angle-left right"></span>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/teacher/fee-details.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Fee Details</span>
              </a>
            </li>
          </ul>
        </li> -->

        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-users"></span>

            <p>
              Study Materials

              <span class="fas fa-angle-left right"></span>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/teacher/.components/study-materials">
                <span class="far fa-circle nav-icon"></span>

                <span>Study Materials</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-users"></span>

            <p>
              Manage Events

              <span class="fas fa-angle-left right"></span>
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-users"></span>

            <p>
              Communications

              <span class="fas fa-angle-left right"></span>
            </p>
          </a>
        </li> -->
      </ul>
    </nav>

  </div>
</aside>