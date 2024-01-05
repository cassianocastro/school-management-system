<section id="sm">
  <div>

    <header>
      <div>
        <h1>Study Materials</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Teacher</a></li>
              <li>/</li>
              <li><a href="#">Study Materials</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <nav>
      <div>
        <ul>
          <?php foreach ( $materials as $material ) : ?>
            <li>
              <?php require __DIR__ . '/.components/material/index.php'; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </nav>

    <footer>
      <div>
        <button type="button" title="Add new study material">
          <span class="fa fa-plus"></span>

          <span>Add New</span>
        </button>
      </div>
    </footer>

    <?php require_once __DIR__ . '/.components/form/index.php'; ?>
  </div>
</section>