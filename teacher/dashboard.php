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
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Teacher</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-graduation-cap"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Students</span>
                  <span class="info-box-number">2000</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Teachers</span>
                  <span class="info-box-number">50</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book-open"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Courses</span>
                  <span class="info-box-number">100</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-question"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">New Inquiries</span>
                  <span class="info-box-number">10</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <hr>

          <?php
          $current_month = strtolower(date('F'));
          $current_year  = date('Y');
          $current_date  = date('d');
          $sql = "SELECT * FROM `attendance` WHERE `attendance_month` = '$current_month' AND year(current_session) = $current_year AND std_id = $std_id";

          $query = mysqli_query($db_conn, $sql);
          $row   = mysqli_fetch_object($query);

          $attendance = unserialize($row->attendance_value);
          // echo '<pre>';
          // print_r($attendance);
          // echo '</pre>';

          if ( isset($_POST['sign-in']) )
          {
            // $att_data = [];

            // for ( $i = 1; $i <= 31; $i++ )
            // {
            //   $att_data[$i] = [
            //     'signin_at'  => (date('d') == $i) ? time() : '',
            //     'signout_at' => (date('d') == $i) ? time() : '',
            //     'date' => $i
            //   ];
            // }

            $attendance[$current_date] = [
              'signin_at'  => time(),
              'signout_at' => '',
              'date'       => $current_date
            ];

            $att_data = serialize($attendance);
            $current_month = strtolower(date('F'));
            $sql = "UPDATE `attendance` SET `attendance_value` = '$att_data' WHERE `attendance_month` = '$current_month' AND std_id = $std_id";

            mysqli_query($db_conn, $sql) or die('DB error');
          }

          if ( isset($_POST['sign-out']) )
          {
            $attendance[$current_date] = [
              'signin_at' => $attendance[$current_date]['signin_at'],
              'signout_at' => time(),
              'date' => $current_date
            ];

            $att_data = serialize($attendance);
            $current_month = strtolower(date('F'));
            $sql = "UPDATE `attendance` SET `attendance_value` = '$att_data' WHERE `attendance_month` = '$current_month' AND std_id = $std_id";

            mysqli_query($db_conn, $sql) or die('DB error');
          }
          ?>
          <div class="row">
            <div class="col-lg-3">
              <div class="card">
                <div class="card-header">
                  Sign in Info
                </div>

                <div class="card-body">
                  <form action="" method="post">
                    <?php
                    if ( empty($attendance[$current_date]['signin_at']) || $attendance[$current_date]['signout_at'] )
                    {
                      echo '<button name="sign-in" class="btn btn-primary">Sign in</button>';
                    }
                    else
                    {
                      echo '<button name="sign-out" class="btn btn-primary">Sign Out</button>';
                    }
                    ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>

    <?php require_once __DIR__ . '/footer.php'; ?>

    <?php require_once __DIR__ . '/sidebar.php'; ?>
  </div><!-- ./wrapper -->

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