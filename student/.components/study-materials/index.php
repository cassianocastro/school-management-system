<?php
// error_reporting(E_ALL);
// ini_set("display_errors", true);

require_once __DIR__ . '/../../../includes/config.php';
require_once __DIR__ . '/../../../actions/student.php';

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

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  <link rel="stylesheet" type="text/css" href="/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/adminlte.min.css">

  <title>Student's Dashboard | School SysManager</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php require_once __DIR__ . '/../header/index.php'; ?>

    <main class="content-wrapper">
      <div>

        <section class="content">
          <div class="container-fluid">

            <header class="content-header">
              <div class="container-fluid">
                <h1 class="m-0 text-dark">Study Materials</h1>

                <nav class="row mb-2">
                  <div class="col-sm-6">
                    <ul class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Student</a></li>
                      <li class="breadcrumb-item active"><a href="#">Study Materials</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </header>

            <div class="card">
              <div class="card-body">
                <div class="table-responsive bg-white">
                  <table class="table table-bordered">
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
              </div>
            </div>

          </div>
        </section>

      </div>
    </main>

    <?php require_once __DIR__ . '/../footer/index.php'; ?>

    <?php require_once __DIR__ . '/../aside/index.php'; ?>
  </div>

  <script src="/plugins/jquery/jquery.min.js"></script>
  <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script src="/assets/js/adminlte.js"></script>
  <script src="/assets/js/demo.js"></script>
  <script src="../../index.js"></script>
</body>
</html>