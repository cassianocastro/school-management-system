<section id="routines">
  <div>

    <header>
      <div>
        <h2>Routines</h2>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li>&sol;</li>
              <li><a href="#">Routines</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <menu>
      <li>
        <button type="button" title="See Periods">
          <span class="far fa-circle"></span>

          <span>Periods</span>
        </button>
      </li>

      <li>
        <button type="button" title="See Time Table">
          <span class="far fa-circle"></span>

          <span>Time Table</span>
        </button>
      </li>
    </menu>

    <?php require_once __DIR__ . '/.components/periods/index.php'; ?>

    <?php require_once __DIR__ . '/.components/timetable/index.php'; ?>

  </div>
</section>