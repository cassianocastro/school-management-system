<section>
  <div>

    <header>
      <div>
        <h1>Periods</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Student</a></li>
              <li><a href="#">Periods</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <table class="table">
      <thead>
        <tr>
          <th>S.No.</th>
          <th>Title</th>
          <th>From</th>
          <th>To</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $rows as $row ) : ?>
          <tr>
            <td><?= $row["count"] ?></td>
            <td><?= $row["period"] ?></td>
            <td><?= $row["from"] ?></td>
            <td><?= $row["to"] ?></td>
          </tr>
        <?php endforeach; ?>
      </toby>
    </table>

  </div>
</section>