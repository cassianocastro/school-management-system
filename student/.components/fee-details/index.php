<section id="fee-details">
  <div>

    <header>
      <div>
        <h2>Fee Details</h2>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li>&sol;</li>
              <li><a href="#">Fee Details</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <menu>
      <li>
        <button type="button" title="Examination Fee">
          <span class="far fa-circle"></span>

          <span>Examination Fee</span>
        </button>
      </li>

      <li>
        <button type="button" title="Tuition Fee">
          <span class="far fa-circle"></span>

          <span>Tuition Fee</span>
        </button>
      </li>
    </menu>

    <?php require_once __DIR__ . '/.components/examination/index.php'; ?>

    <?php require_once __DIR__ . '/.components/tuition/index.php'; ?>

  </div>
</section>