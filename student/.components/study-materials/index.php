<section>
  <div>

    <header>
      <div>
        <h1>Study Materials</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li>&sol;</li>
              <li><a href="#">SM</a></li>
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
              <article id="material-<?= $material["count"] ?>" class="material">
                <div>
                  <header>
                    <div>
                      <h3><?= $material["att_title"] ?></h3>
                    </div>
                  </header>

                  <p>
                    <span><?= $material["class_title"] ?></span>

                    <span><?= $material["subject_title"] ?></span>
                  </p>

                  <footer>
                    <div>
                      <time><?= $material["att_pubdate"] ?></time>

                      <a class="fas fa-download" href="<?= $material["attachment"] ?>"></a>
                    </div>
                  </footer>
                </div>
              </article>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </nav>

  </div>
</section>