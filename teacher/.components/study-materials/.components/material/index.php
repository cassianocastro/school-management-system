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