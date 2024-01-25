<section id="profile">
  <div>

    <header>
      <div>
        <h1>Profile</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li>&sol;</li>
              <li><a href="#">Profile</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <?php foreach ( [1, 2] as $parent ) : ?>
      <?php require __DIR__ . '/.components/section/index.php'; ?>
    <?php endforeach; ?>

    <?php require_once __DIR__ . '/.components/aside/index.php'; ?>

  </div>
</section>