<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a class="brand-link" href="<?= $site_url ?>student/profile.php">
    <img
      src="../assets/img/AdminLTELogo.png"
      alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3"
      style="opacity: .8"
    >
    <!-- <span class="brand-image img-circle elevation-3"><i class="fa fa-user"></i></span> -->
    <span class="brand-text font-weight-light">Student Panel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="<?= $site_url ?>student/dashboard.php">
            <i class="nav-icon fas fa-tachometer-alt"></i>

            <p>Dashboard</p>
          </a>
        </li>

        <!-- Syllabus -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <i class="nav-icon fas fa-chalkboard"></i>

            <p>
              Manage Syllabus

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/courses.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Courses</p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/subjects.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Subjects</p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/lessons.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Lessons</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Class Routine -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>

            <p>
              Manage Class Routines

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/periods.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Periods</p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/timetable.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Time Table</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Examination -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <i class="nav-icon fas fa-file-alt"></i>

            <p>
              Manage Examinations

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/exam-form.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Examination Form</p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/admin-card.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Admin card</p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/paper-schedule.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Paper Schedule</p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/results.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Results</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Attendance -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <i class="nav-icon fas fa-calendar-alt"></i>

            <p>
              Manage Attendance

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/attendance.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Attendance</p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/leave.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Leave</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Fees -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <i class="nav-icon fas fa-money-check"></i>

            <p>
              Fee Details

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/fee-details.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Tuition Fee</p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/examination-fee.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Examination Fee</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Study Materials -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <i class="nav-icon fas fa-paste"></i>

            <p>
              Study Materials

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/study-materials.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Study Materials</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Event -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <i class="nav-icon fas fa-calendar-check"></i>

            <p>
              Manage Events

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/campus-functions.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Campus Functions</p>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/webinar-seminar.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Webinar/Seminar</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Communication -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <i class="nav-icon fas fa-users"></i>

            <p>
              Communications

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>student/parent-meeting.php">
                <i class="far fa-circle nav-icon"></i>

                <p>Parent's Meetings</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>