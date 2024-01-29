<section id="syllabus">
  <div>

    <header>
      <div>
        <h2>Syllabus</h2>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li>&sol;</li>
              <li><a href="#">Syllabus</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <menu>
      <li>
        <button type="button" title="Manage Courses">
          <span class="far fa-circle"></span>

          <span>Courses</span>
        </button>
      </li>

      <li>
        <button type="button" title="Manage Lessons">
          <span class="far fa-circle"></span>

          <span>Lessons</span>
        </button>
      </li>

      <li>
        <button type="button" title="Manage Subjects">
          <span class="far fa-circle"></span>

          <span>Subjects</span>
        </button>
      </li>
    </menu>

    <?php require_once __DIR__ . '/.components/courses/index.php'; ?>

    <?php require_once __DIR__ . '/.components/lessons/index.php'; ?>

    <?php require_once __DIR__ . '/.components/subjects/index.php'; ?>

  </div>
</section>