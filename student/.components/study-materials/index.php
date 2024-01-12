<section>
  <div>

    <header>
      <div>
        <h1>Study Materials</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li><a href="#">Study Materials</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <table class="table">
      <thead>
        <tr>
          <th>S. No.</th>
          <th>Title</th>
          <th>Attachment</th>
          <th>Class</th>
          <th>Subject</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $materials as $material ) : ?>
          <tr>
            <td><?= $material["count"] ?></td>
            <td><?= $material["att_title"] ?></td>
            <td><a href="<?= $material["attachment"] ?>">Download File</a></td>
            <td><?= $material["class_title"] ?></td>
            <td><?= $material["subject_title"] ?></td>
            <td><?= $material["att_pubdate"] ?></td>
          </tr>
        <?php endforeach; ?>
      </toby>
    </table>

  </div>
</section>