<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="sidebar">
    <header>
      <div>
        <a class="brand-link" href="<?= $site_url ?>/student/profile.php">
          <figure>
            <img
              src="<?= $site_url ?>/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3"
              style="opacity: .8"
            >

            <!--
            <figcaption class="brand-image img-circle elevation-3">
              <i class="fa fa-user"></i>
            </figcaption>
            -->
            <figcaption class="brand-text font-weight-light">Student Panel</figcaption>
          </figure>
        </a>
      </div>
    </header>

    <menu>
      <li>
        <button type="button" onclick="location.assign('<?= $site_url ?>/student')">
          <span class="fas fa-tachometer-alt"></span>

          <span>Dashboard</span>
        </button>
      </li>

      <li>
        <button type="button" onclick="location.assign('#')">
          <span class="fas fa-chalkboard"></span>

          <span>Manage Syllabus</span>

          <span class="fas fa-angle-left right"></span>
        </button>

        <menu>
          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/syllabus/courses.php')">
              <span class="far fa-circle"></span>

              <span>Courses</span>
            </button>
          </li>

          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/syllabus/lessons.php')">
              <span class="far fa-circle"></span>

              <span>Lessons</span>
            </button>
          </li>

          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/syllabus/subjects.php')">
              <span class="far fa-circle"></span>

              <span>Subjects</span>
            </button>
          </li>
        </menu>
      </li>

      <li>
        <button type="button" onclick="location.assign('#')">
          <span class="fas fa-chalkboard-teacher"></span>

          <span>Manage Class Routines</span>

          <span class="fas fa-angle-left right"></span>
        </button>

        <menu>
          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/routines/periods.php')">
              <span class="far fa-circle"></span>

              <span>Periods</span>
            </button>
          </li>

          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/routines/timetable.php')">
              <span class="far fa-circle"></span>

              <span>Time Table</span>
            </button>
          </li>
        </menu>
      </li>

      <li>
        <button type="button" onclick="location.assign('#')">
          <span class="fas fa-file-alt"></span>

          <span>Manage Examinations</span>

          <span class="fas fa-angle-left right"></span>
        </button>

        <menu>
          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/examinations/admin-card.php')">
              <span class="far fa-circle"></span>

              <span>Admin card</span>
            </button>
          </li>

          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/examinations/exam-form.php')">
              <span class="far fa-circle"></span>

              <span>Examination Form</span>
            </button>
          </li>

          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/examinations/paper-schedule.php')">
              <span class="far fa-circle"></span>

              <span>Paper Schedule</span>
            </button>
          </li>

          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/examinations/results.php')">
              <span class="far fa-circle"></span>

              <span>Results</span>
            </button>
          </li>
        </menu>
      </li>

      <li>
        <button type="button" onclick="location.assign('#')">
          <span class="fas fa-calendar-alt"></span>

          <span>Manage Attendance</span>

          <span class="fas fa-angle-left right"></span>
        </button>

        <menu>
          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/attendance/attendance.php')">
              <span class="far fa-circle"></span>

              <span>Attendance</span>
            </button>
          </li>

          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/attendance/leave.php')">
              <span class="far fa-circle"></span>

              <span>Leave</span>
            </button>
          </li>
        </menu>
      </li>

      <li>
        <button type="button" onclick="location.assign('#')">
          <span class="fas fa-money-check"></span>

          <span>Fee Details</span>

          <span class="fas fa-angle-left right"></span>
        </button>

        <menu>
          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/fee-details/.components/examination')">
              <span class="far fa-circle"></span>

              <span>Examination Fee</span>
            </button>
          </li>

          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/fee-details/.components/tuition')">
              <span class="far fa-circle"></span>

              <span>Tuition Fee</span>
            </button>
          </li>
        </menu>
      </li>

      <li>
        <button type="button" onclick="location.assign('#')">
          <span class="fas fa-paste"></span>

          <span>Study Materials</span>

          <span class="fas fa-angle-left right"></span>
        </button>

        <menu>
          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/study-materials')">
              <span class="far fa-circle"></span>

              <span>Study Materials</span>
            </button>
          </li>
        </menu>
      </li>

      <li>
        <button type="button" onclick="location.assign('#')">
          <span class="fas fa-calendar-check"></span>

          <span>Manage Events</span>

          <span class="fas fa-angle-left right"></span>
        </button>

        <menu>
          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/events/campus-functions.php')">
              <span class="far fa-circle"></span>

              <span>Campus Functions</span>
            </button>
          </li>

          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/events/webinar-seminar.php')">
              <span class="far fa-circle"></span>

              <span>Webinar/Seminar</span>
            </button>
          </li>
        </menu>
      </li>

      <li>
        <button type="button" onclick="location.assign('#')">
          <span class="fas fa-users"></span>

          <span>Communications</span>

          <span class="fas fa-angle-left right"></span>
        </button>

        <menu>
          <li>
            <button type="button" onclick="location.assign('<?= $site_url ?>/student/.components/communications/parent-meeting.php')">
              <span class="far fa-circle"></span>

              <span>Parent's Meetings</span>
            </button>
          </li>
        </menu>
      </li>
    </menu>

  </div>
</aside>