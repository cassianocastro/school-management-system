<?php require_once __DIR__ . '/../includes/config.php'; ?>

<?php require_once __DIR__ . '/../actions/parent.php'; ?>

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

  <title>Parent's Dashboard | School SysManager</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php require_once __DIR__ . '/.components/header/index.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Content Header (Page header) -->
      <header class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">

            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div>

            <div class="col-sm-6">
              <ul class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Parent</a></li>
                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
              </ul>
            </div>

          </div>
        </div>
      </header>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1">
                  <i class="fas fa-graduation-cap"></i>
                </span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Students</span>
                  <span class="info-box-number">2000</span>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1">
                  <i class="fas fa-users"></i>
                </span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Teachers</span>
                  <span class="info-box-number">50</span>
                </div>
              </div>
            </div>

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1">
                  <i class="fas fa-book-open"></i>
                </span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Courses</span>
                  <span class="info-box-number">100</span>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1">
                  <i class="fas fa-question"></i>
                </span>

                <div class="info-box-content">
                  <span class="info-box-text">New Inquiries</span>
                  <span class="info-box-number">10</span>
                </div>
              </div>
            </div>
          </div>

          <hr>

        </div>
      </section>
    </div>

    <?php require_once __DIR__ . '/.components/footer/index.php'; ?>

    <?php require_once __DIR__ . '/.components/aside/index.php'; ?>
  </div>

  <script defer src="/plugins/jquery/jquery.min.js"></script>
  <script defer src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script defer src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script defer src="/assets/js/adminlte.js"></script>
  <script defer src="/assets/js/demo.js"></script>
  <script defer src="./index.js"></script>
</body>
</html>