<?php
require_once __DIR__ . '/../../../includes/config.php';
require_once __DIR__ . '/../../../actions/student.php';

$rows    = [];
$count   = 1;
$periods = get_posts(['type' => 'period', 'status' => 'publish']);

foreach ( $periods as $period )
{
  $from = get_metadata($period->id, 'from')[0]->meta_value;
  $to   = get_metadata($period->id, 'to')[0]->meta_value;

  $rows[] = [
    "count"  => $count++,
    "period" => $period->title,
    "from"   => date('h:i A', strtotime($from)),
    "to"     => date('h:i A', strtotime($to))
  ];
}
?>

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