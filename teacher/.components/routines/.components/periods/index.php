<section id="periods">
  <div>

    <header>
      <div>
        <h1>Periods</h1>

        <nav>
          <div>
            <ul>
              <li><a href="#">Teacher</a></li>
              <li>/</li>
              <li><a href="#">Periods</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <table>
      <thead>
        <tr>
          <th>S. No.</th>
          <th>Title</th>
          <th>From</th>
          <th>To</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $rows as $row ) : ?>
          <tr>
            <td><?= $row["count"] ?></td>
            <td><?= $row["title"] ?></td>
            <td><?= $row["from"] ?></td>
            <td><?= $row["to"] ?></td>
          </tr>
        <?php endforeach; ?>
      </toby>
    </table>

  </div>
</section>