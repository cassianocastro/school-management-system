<?php
$materials = [];
$count     = 1;
$query     = mysqli_query(
  $db_conn,
  <<<SQL
    SELECT
      *
    FROM
      posts
    WHERE
      type = 'study-material'
    AND
      author = 1
  SQL
);

while ( $att = mysqli_fetch_object($query) )
{
  $class_id        = get_metadata($att->id, 'class')[0]->meta_value;
  $class           = get_post(['id' => $class_id]);
  $subject_id      = get_metadata($att->id, 'subject')[0]->meta_value;
  $subject         = get_post(['id' => $subject_id]);
  $file_attachment = get_metadata($att->id, 'file_attachment')[0]->meta_value;

  // $file_attachment = get_post(['id' => $file_attachment]);
  // echo '<pre>', print_r($class), '</pre>';

  $materials[] = [
    "count"         => $count++,
    "att_title"     => $att->title,
    "attachment"    => SITE_URL . "/assets/uploads/$file_attachment",
    "class_title"   => $class->title,
    "subject_title" => $subject->title,
    "att_pubdate"   => $att->publish_date
  ];
}
?>

<section id="table">
  <div>

    <header>
      <div>
        <h3>Study Materials</h3>

        <button type="button" title="Add new study material">
          <span class="fa fa-plus"></span>

          <span>Add New</span>
        </button>
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