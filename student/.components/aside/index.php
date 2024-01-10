<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a class="brand-link" href="<?= $site_url ?>/student/profile.php">
    <img
      src="<?= $site_url ?>/assets/img/AdminLTELogo.png"
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
          <a class="nav-link" href="<?= $site_url ?>/student">
            <span class="nav-icon fas fa-tachometer-alt"></span>

            <span>Dashboard</span>
          </a>
        </li>

        <!-- Syllabus -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-chalkboard"></span>

            <span>Manage Syllabus</span>

            <span class="fas fa-angle-left right"></span>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/syllabus/courses.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Courses</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/syllabus/lessons.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Lessons</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/syllabus/subjects.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Subjects</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Class Routine -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-chalkboard-teacher"></span>

            <span>Manage Class Routines</span>

            <span class="fas fa-angle-left right"></span>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/routines/periods.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Periods</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/routines/timetable.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Time Table</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Examination -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-file-alt"></span>

            <span>Manage Examinations</span>

            <span class="fas fa-angle-left right"></span>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/examinations/admin-card.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Admin card</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/examinations/exam-form.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Examination Form</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/examinations/paper-schedule.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Paper Schedule</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/examinations/results.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Results</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Attendance -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-calendar-alt"></span>

            <span>Manage Attendance</span>

            <span class="fas fa-angle-left right"></span>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/attendance/attendance.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Attendance</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/attendance/leave.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Leave</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Fees -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-money-check"></span>

            <span>Fee Details</span>

            <span class="fas fa-angle-left right"></span>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/fee-details/.components/examination">
                <span class="far fa-circle nav-icon"></span>

                <span>Examination Fee</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/fee-details/.components/tuition">
                <span class="far fa-circle nav-icon"></span>

                <span>Tuition Fee</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Study Materials -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-paste"></span>

            <span>Study Materials</span>

            <span class="fas fa-angle-left right"></span>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/study-materials">
                <span class="far fa-circle nav-icon"></span>

                <span>Study Materials</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Event -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-calendar-check"></span>

            <span>Manage Events</span>

            <span class="fas fa-angle-left right"></span>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/events/campus-functions.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Campus Functions</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/events/webinar-seminar.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Webinar/Seminar</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- Communication -->
        <li class="nav-item has-treeview">
          <a class="nav-link" href="#">
            <span class="nav-icon fas fa-users"></span>

            <span>Communications</span>

            <span class="fas fa-angle-left right"></span>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="<?= $site_url ?>/student/.components/communications/parent-meeting.php">
                <span class="far fa-circle nav-icon"></span>

                <span>Parent's Meetings</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>