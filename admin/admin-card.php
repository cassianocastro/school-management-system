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

  <title>Admin | Dashboard</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php require_once __DIR__ . '/header.php'; ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Time Table</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Student</a></li>
              <li class="breadcrumb-item active">Time Table</li>
            </ol>
          </div>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">

          </div>
        </div>
      </div>
    </section><!-- /.content -->

    <?php require_once __DIR__ . '/sidebar.php'; ?>

    <?php require_once __DIR__ . '/footer.php'; ?>
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