<?php
// error_reporting(E_ALL);
// ini_set("display_errors", true);

// require_once __DIR__ . '/../../../includes/config.php';
// require_once __DIR__ . '/../../../actions/student.php';

$materials = [];
$usermeta  = get_user_metadata($std_id);
$class     = $usermeta['class'];
$count     = 1;
$query     = mysqli_query(
  $db_conn,
  <<<SQL
    SELECT
      *
    FROM
      posts AS p
    INNER JOIN
      metadata AS m ON p.id = m.item_id
    WHERE
      p.type = 'study-material'
    AND
      m.meta_key = 'class'
    AND
      m.meta_value = $class
  SQL
);

while ( $att = mysqli_fetch_object($query) )
{
  // $class_id     = get_metadata($att->id, 'class')[0]->meta_value;
  $class           = get_post(['id' => $class]);
  $subject_id      = get_metadata($att->item_id, 'subject')[0]->meta_value;
  $subject         = get_post(['id' => $subject_id]);
  $file_attachment = get_metadata($att->item_id, 'file_attachment')[0]->meta_value;

  $materials[] = [
    "count"         => $count++,
    "att_title"     => $att->title,
    "attachment"    => "$site_url/assets/uploads/$file_attachment",
    "class_title"   => $class->title,
    "subject_title" => $subject->title,
    "att_pubdate"   => $att->publish_date,
  ];
}
?>

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