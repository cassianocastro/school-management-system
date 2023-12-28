<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= $site_url ?>/admin" class="brand-link">
    <img
      src="<?= $site_url ?>/assets/img/AdminLTELogo.png"
      alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3"
      style="opacity: .8">

    <span class="brand-text font-weight-light">SMS Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="<?= $site_url ?>/admin" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>

            <p>Dashboard</p>
          </a>
        </li>

        <!-- Accounts -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>

            <p>
              Manage Accounts

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/accounts/?user=counseller" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Counseller</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/accounts/?user=teacher" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Teachers</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/accounts/?user=student" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Students</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/accounts/?user=parent" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Parents</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/accounts/?user=librarian" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Librarian</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Manage Classes -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chalkboard"></i>

            <p>
              Manage Classes

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/classes/sections.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Sections</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/classes/classes.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Classes</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/classes/courses.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Courses</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/classes/subjects.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Subjects</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/classes/lessons.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Lessons</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Class Routines -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>

            <p>
              Manage Class Routines

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/routines/periods.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Periods</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/routines/timetable.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Time Table</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Examination -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>

            <p>
              Manage Examinations

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/examinations/exam-form.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Examination Form</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/examinations/admin-card.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Admin card</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/examinations/paper-schedule.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Paper Schedule</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/examinations/results.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Results</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Attendance -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>

            <p>
              Manage Attendance

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/attendance/attendance.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Attendance</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/attendance/leave.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Leave</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Manage Accounts -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-money-check"></i>

            <p>
              Manage Accountings

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/accountings/student-fee.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Student Fee Details</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Study Materials -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-paste"></i>

            <p>
              Study Materials

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/study-materials" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Study Materials</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Events -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar-check"></i>

            <p>
              Manage Events

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/events/campus-functions.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Campus Functions</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/events/webinar-seminar.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Webinar/Seminar</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Communication -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>

            <p>
              Communications

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/communications/parent-meeting.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Parent's Meetings</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Academy Settings -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>

            <p>
              Academy Settings

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $site_url ?>/admin/.components/academy-settings/basic-information.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>

                <p>Basic Informations</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

  </div>
</aside>