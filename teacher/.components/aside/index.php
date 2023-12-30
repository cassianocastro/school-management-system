<aside>
  <div>

    <nav>
      <div>
        <ul data-widget="treeview" data-accordion="false" role="menu">
          <li>
            <a href="<?= $site_url ?>">
              <figure>
                <img
                  src="<?= $site_url ?>/assets/img/AdminLTELogo.png"
                  alt="AdminLTE Logo"
                  height="50"
                  width="50"
                >

                <figcaption>Teacher Panel</figcaption>
              </figure>
            </a>
          </li>

          <!--
            Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library
          -->
          <li class="nav-item">
            <a class="nav-link" href="<?= $site_url ?>/teacher">
              <span class="fas fa-tachometer-alt"></span>

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
              <span class="fas fa-users"></span>

              <span>Manage Class Routines</span>

              <span class="fas fa-angle-left right"></span>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link" href="<?= $site_url ?>/teacher/.components/routines/.components/periods">
                  <span class="far fa-circle"></span>

                  <span>Periods</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?= $site_url ?>/teacher/.components/routines/.components/timetable">
                  <span class="far fa-circle"></span>

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
              <span class="fas fa-users"></span>

              <span>Study Materials</span>

              <span class="fas fa-angle-left right"></span>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link" href="<?= $site_url ?>/teacher/.components/study-materials">
                  <span class="far fa-circle"></span>

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
      </div>
    </nav>

  </div>
</aside>