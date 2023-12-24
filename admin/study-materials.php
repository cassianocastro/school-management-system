<?php require_once __DIR__ . '/../includes/config.php'; ?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="stylesheet" type="text/css" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <title>Admin's Dashboard | School SysManager</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php require_once __DIR__ . '/header.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">

            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Study Materials</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Student</a></li>
                <li class="breadcrumb-item active">Study Materials</li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="card">

            <div class="card-header py-2">
              <h3 class="card-title">Study Materials</h3>
            </div>

            <div class="card-body">
              <div class="table-responsive bg-white">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S.No.</th>
                      <th>Title</th>
                      <th>Attachment</th>
                      <th>Class</th>
                      <th>Subject</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $usermeta = get_user_metadata($std_id);
                    $class = $usermeta['class'];
                    $count = 1;
                    $query = mysqli_query(
                      $db_conn,
                      <<<SQL
                        SELECT * FROM
                          posts as p
                        INNER JOIN
                          metadata as m ON p.id = m.item_id
                        WHERE
                          p.`type` = 'study-material'
                        AND
                          m.meta_key = 'class'
                        AND
                          m.meta_value = $class
                      SQL
                    );

                    while ( $att = mysqli_fetch_object($query) )
                    {
                      // $class_id = get_metadata($att->id, 'class')[0]->meta_value;

                      $class      = get_post(['id' => $class]);
                      $subject_id = get_metadata($att->item_id, 'subject')[0]->meta_value;
                      $subject    = get_post(['id' => $subject_id]);
                      $file_attachment = get_metadata($att->item_id, 'file_attachment')[0]->meta_value;
                    ?>
                    <tr>
                      <td><?= $count++ ?></td>
                      <td><?= $att->title ?></td>
                      <td><a href="<?="../dist/uploads/$file_attachment"; ?>">Download File</a></td>
                      <td><?= $class->title ?></td>
                      <td><?= $subject->title ?></td>
                      <td><?= $att->publish_date ?></td>
                    </tr>
                    <?php } ?>
                  </toby>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php require_once __DIR__ . '/footer.php'; ?>

    <?php require_once __DIR__ . '/sidebar.php'; ?>
  </div>

  <script defer src="../plugins/jquery/jquery.min.js"></script>
  <script defer src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script defer src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script defer src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script defer src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script defer src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script defer src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script defer src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script defer src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script defer src="../dist/js/adminlte.js"></script>
  <script defer src="../dist/js/demo.js"></script>
  <!-- <script defer src="./dashboard.js"></script> -->
</body>
</html>