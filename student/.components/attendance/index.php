<section id="attendance">
  <div>

    <header>
      <div>
        <h2>Attendance</h2>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li>&sol;</li>
              <li><a href="#">Attendance</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <menu>
      <li>
        <button type="button" title="Manage Attendance">
          <span class="far fa-circle"></span>

          <span>Attendance</span>
        </button>
      </li>

      <li>
        <button type="button" title="Leave">
          <span class="far fa-circle"></span>

          <span>Leave</span>
        </button>
      </li>
    </menu>

    <?php require_once __DIR__ . '/.components/attendance/index.php'; ?>

    <?php require_once __DIR__ . '/.components/leave/index.php'; ?>

  </div>
</section>