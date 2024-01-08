<?php require_once __DIR__ . '/../../../includes/config.php'; ?>

<?php require_once __DIR__ . '/../../../actions/student.php'; ?>

<?php
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

    <div class="content-wrapper">

      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">

            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Periods</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Student</a></li>
                <li class="breadcrumb-item active">Periods</li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <section class="content">
        <div class="container-fluid">
          <div class="table-responsive">
            <table class="table table-bordered">
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
        </div>
      </section>
    </div>

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