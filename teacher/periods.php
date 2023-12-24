<?php
require_once __DIR__ . '/../includes/config.php';

error_reporting(E_ALL);
ini_set("display_errors", true);

$site_url = "http://{$_SERVER['SERVER_NAME']}";

if ( isset($_SESSION['login']) )
{
  if ( isset($_SESSION['user_type']) and $_SESSION['user_type'] != 'teacher' )
  {
    $user_type = $_SESSION['user_type'];

    header("Location: ../$user_type/dashboard.php");
  }
}
else
{
  header("Location: ../login");
}

$std_id  = $_SESSION['user_id'];
$student = get_user_data($std_id);
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!--
    1. Font Awesome Icons
    2. overlayScrollbars
    3. Theme style
    4. Google Font: Source Sans Pro
  -->
  <link rel="stylesheet" type="text/css" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <title>Teacher | Dashboard</title>
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
      <!-- /.content-header -->

      <!-- Main content -->
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
                <?php
                $count   = 1;
                $args    = ['type' => 'period', 'status' => 'publish'];
                $periods = get_posts($args);

                foreach ( $periods as $period ) :
                  $from = get_metadata($period->id, 'from')[0]->meta_value;
                  $to   = get_metadata($period->id, 'to')[0]->meta_value;
                ?>
                <tr>
                  <td><?= $count++ ?></td>
                  <td><?= $period->title ?></td>
                  <td><?= date('h:i A', strtotime($from)) ?></td>
                  <td><?= date('h:i A', strtotime($to)) ?></td>
                </tr>
                <?php endforeach; ?>
              </toby>
            </table>
          </div>
        </div>
      </section>
    </div>

    <?php require_once __DIR__ . '/footer.php'; ?>

    <?php require_once __DIR__ . '/sidebar.php'; ?>
  </div>

  <!--
    1. jQuery
    2. Bootstrap
    3. overlayScrollbars
    4. AdminLTE App
    5. OPTIONAL SCRIPTS
  -->
  <script defer src="../plugins/jquery/jquery.min.js"></script>
  <script defer src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script defer src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <script defer src="../dist/js/adminlte.js"></script>
  <script defer src="../dist/js/demo.js"></script>
  <script defer src="./index.js"></script>
</body>
</html>