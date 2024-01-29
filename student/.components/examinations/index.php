<section id="examinations">
  <div>

    <header>
      <div>
        <h2>Examinations</h2>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li>&sol;</li>
              <li><a href="#">Examinations</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <menu>
      <li>
        <button type="button" title="Manage Admin Cards">
          <span class="far fa-circle"></span>

          <span>Admin card</span>
        </button>
      </li>

      <li>
        <button type="button" title="Manage Examination Forms">
          <span class="far fa-circle"></span>

          <span>Examination Form</span>
        </button>
      </li>

      <li>
        <button type="button" title="Manage Paper Schedule">
          <span class="far fa-circle"></span>

          <span>Paper Schedule</span>
        </button>
      </li>

      <li>
        <button type="button" title="Manage Results">
          <span class="far fa-circle"></span>

          <span>Results</span>
        </button>
      </li>
    </menu>

    <?php require_once __DIR__ . '/.components/admin-card/index.php'; ?>

    <?php require_once __DIR__ . '/.components/exam-form/index.php'; ?>

    <?php require_once __DIR__ . '/.components/paper-schedule/index.php'; ?>

    <?php require_once __DIR__ . '/.components/results/index.php'; ?>

  </div>
</section>