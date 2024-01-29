<section id="events">
  <div>

    <header>
      <div>
        <h2>Events</h2>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li>&sol;</li>
              <li><a href="#">Events</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <menu>
      <li>
        <button type="button" title="Manage Campus Functions">
          <span class="far fa-circle"></span>

          <span>Campus Functions</span>
        </button>
      </li>

      <li>
        <button type="button" title="Webinars & Seminars">
          <span class="far fa-circle"></span>

          <span>Webinar/Seminar</span>
        </button>
      </li>
    </menu>

    <?php require_once __DIR__ . '/.components/cf/index.php'; ?>

    <?php require_once __DIR__ . '/.components/ws/index.php'; ?>

  </div>
</section>